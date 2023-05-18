
<?php
include('message.php');
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <title>Login</title>
</head>

<body>
    
 <div class="container">
 	<div class="header">
 		<h1>login</h1>
 	</div>
 	<div class="main">
 		<form action="code.php" method="POST">
 			<span>
 				<i class="fa fa-user"></i>
 				<input type="email" placeholder="email" name="email">
 			</span><br>
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" placeholder="password" name="password">
 			</span><br>
 				<button type="submit" name="login">login</button>

 		</form>
 	</div>
 </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->
</body>
</html>
