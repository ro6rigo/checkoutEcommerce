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
$cod = $_POST['cod'];

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
echo '<br>Credit Card Number: ';
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
/*
if($sale->getPayment()->getStatus() == 2){
	Header("Location: retorno.php?cod=0&TID=" . $sale->getPayment()->getTid());
}else{
	Header("Location: retorno.php?cod=1&status=".$sale->getPayment()->getStatus()."&erro=".$sale->getPayment()->getReturnCode());
}*/