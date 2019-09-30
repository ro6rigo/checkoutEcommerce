<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Validacao da Compra</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Pagamento Online</h2>
        
      </div>

      <div class="row">
        
        <div class="col-md-12">
			<?php
			if(isset($_GET['cod'])){
			if($_GET['cod'] == "0"){ ?>
			<div class="alert alert-success" role="alert">
			  Pagamento realizado com sucesso! <?php $tid=$_GET['TID']; echo "TID ".$tid ?>
			</div>
			<?php }else if($_GET['cod'] == "1"){ ?>
			<div class="alert alert-danger" role="alert">
			  Falha ao realizar o pagamento! <?php echo "Status: " . $_GET['status'] . " | Erro: " . $_GET['erro']; ?>
			</div>
			<?php }else{ ?>
			<div class="alert alert-danger" role="alert">
			  Falha ao realizar o pagamento! <?php echo "Erro Integração : " . $_GET['erro']; ?>
			</div>				
			<?php }}?>
			
        </div>
      </div>

        <?php 
        $pID=($_GET['paymentID']);
        //echo $pID;
        //echo $tid;
        
        $con=mysqli_connect("localhost","root","root","dbVendas");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "INSERT INTO vendas(id, tid, paymentId) VALUES (123,'$tid','$pID')";
        if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }

        // MOSTRA A MENSAGEM DE SUCESSO
        //echo "1 record added";

        mysqli_close($con);
        ?>
        <form method=POST action=consulta.php?$pID>
        <input type="hidden" name="payID" id="payID" value="<?php echo $pID?>">
        <button class="btn btn-primary" type="submit">Consultar Vendas</button>
        </form>
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019-2020 Empresa R</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
    
  </body>
</html>
