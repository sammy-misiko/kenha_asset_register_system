
<?php
session_start();
include('message.php');
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
    <title>Registration</title>
</head>

<body>
    <!--
    <div>
        <h1>Registration Form</h1>
        <a href="landing.php" class="btn btn-primary float-end">Home</a>
    </div>
    
    <form action="code.php" method="POST">

        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <label>Role:</label>
        <select name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>
        <!-<input type="submit" value="Register"> --
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>-->


    <div class="container">
 	<div class="header">
 		<h1>Register</h1>
 	</div>
 	<div class="main">
 		<form action="code.php" method="POST">
 			<span>
 				<i class="fa fa-email"></i>
 				<input type="email" placeholder="email" name="email">
 			</span><br>
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" placeholder="password1" name="password1">
 			</span><br>
             <span>
 				<i class="fa fa-lock"></i>
 				<input type="password" placeholder="password2" name="password2">
 			</span><br>
            <span>
 				<i class="fa fa-user"></i>
 				<input type="text" placeholder="role" name="role">
 			</span><br>
 				<button type="submit" name="register">Register</button>
                


 		</form>
 	</div>
 </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
