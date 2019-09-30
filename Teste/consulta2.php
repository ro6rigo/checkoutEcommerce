<?php

        $con=mysqli_connect("localhost","root","root","dbVendas");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "SELECT cod,paymentId FROM vendas";
        echo 'Cod  | PaymentID<br>';
        $res=mysqli_query($con,$sql);
        while ($rs=mysqli_fetch_array($res))
        {
            echo $rs['cod'].'  | '.$rs['paymentId'].'<br>';
        }

        mysqli_close($con);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>API 3.0 da Cielo e PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">
    <br><br><h3>Qual venda deseja consultar?</h3>
    <form method=POST action=verificar-Status.php>
        <input type="text" name="cod" id="cod" placeholder="Cod">
        <button class="btn btn-primary" type="submit">Consultar</button>
    </form>

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