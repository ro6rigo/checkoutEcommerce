<?php

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

require 'vendor/autoload.php';

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;



// ...
// Configure o ambiente
$environment = $environment = Environment::sandbox();

// Configure seu merchant
$merchant = new Merchant('37e6b78c-9e3d-43a3-be59-a7b33e9e6ae9', 'AMQGMZGDJPJLUVJXEKPNAQOZCKVSTKHGBFGRBKZE');

// buscar no banco do seu sistema o Payment ID da transação Cielo pelo ID interno do seu sistema
//$id_seu_sistema = $_GET['id'];
//$payment_id = fgets(fopen ('transacao.txt', 'r'), 1024);
$cod = $_GET['codigo'];
//echo 'cod:'.$cod;

$con=mysqli_connect("localhost","root","root","dbVendas");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT `paymentId` FROM `vendas` WHERE cod = $cod";
$res = mysqli_query($con,$sql);
if (!$rs=mysqli_fetch_array($res))
{
	die('Error: ' . mysqli_error($con));
}
//echo $rs['paymentId'];
mysqli_close($con);

$payment_id =$rs['paymentId'];
//echo "ID:".$payment_id;
$sale = (new CieloEcommerce($merchant, $environment))->getSale($payment_id);
		
//print_r($sale->getPayment());
/*echo '<br>Credit Card Number: ';
print_r($sale->getPayment()->getCreditCard()->getCardNumber());
echo'<br> Holder: ';
print_r($sale->getPayment()->getCreditCard()->getHolder());
echo'<br> Amount: ';
print_r(($sale->getPayment()->getAmount())/100);
echo'<br> Status: ';
print_r($sale->getPayment()->getStatus());
echo'(Confirmed) ';
echo'<br> Date: ';
print_r($sale->getPayment()->getReceivedDate());

if($sale->getPayment()->getStatus() == 2){
	Header("Location: retorno.php?cod=0&TID=" . $sale->getPayment()->getTid());
}else{
	Header("Location: retorno.php?cod=1&status=".$sale->getPayment()->getStatus()."&erro=".$sale->getPayment()->getReturnCode());
}*/
?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Exemplo de pagina</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">E-commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="consulta.php">Consulta</a>
            </li>
            </ul>
        </div>
    </nav>
    <form method=GET action=consulta.php>
    <div class="container mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php print_r($sale->getPayment()->getCreditCard()->getHolder());?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Cartao Credito: <?php print_r($sale->getPayment()->getCreditCard()->getCardNumber());?></h6>
                    <p class="card-text mt-3">Data: <?php print_r($sale->getPayment()->getReceivedDate());?></p>
                    <p class="card-text">Valor: R$ <?php print_r(($sale->getPayment()->getAmount())/100);?></p>
                </div>
            </div> 
            <button type="submit" class="btn btn-primary mt-2">Voltar</button>           
        </div>
    </div>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>