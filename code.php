<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_device']))
{
    $device_id = mysqli_real_escape_string($con, $_POST['delete_device']);

    $query = "DELETE FROM device WHERE id='$device_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Device Deleted Successfully";
        header("Location: admin-dashboard.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Device Not Deleted";
        header("Location: admin-dashboard.php");
        exit(0);
    }
}

if(isset($_POST['update_device']))
{
    $device_id = mysqli_real_escape_string($con, $_POST['device_id']);

    $sno = mysqli_real_escape_string($con, $_POST['sno']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $assignedto = mysqli_real_escape_string($con, $_POST['assignedto']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $tag = mysqli_real_escape_string($con, $_POST['tag']);

    $query = "UPDATE device SET sno='$sno', name='$name', model='$model', assignedto='$assignedto', department= '$department', state='$state', tag='$tag' WHERE id='$device_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Device Updated Successfully";
        header("Location: admin-dashboard.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Device Not Updated";
        header("Location: admin-dashboard.php");
        exit(0);
    }

}

//admin-device-create
if(isset($_POST['save_device']))
{
    $sno = mysqli_real_escape_string($con, $_POST['sno']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $assignedto = mysqli_real_escape_string($con, $_POST['assignedto']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $tag = mysqli_real_escape_string($con, $_POST['tag']);

    $query = "INSERT INTO device (sno,name,model,assignedto,department,state,tag) VALUES ('$sno','$name','$model','$assignedto','$department','$state','$tag')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Device Created Successfully";
        header("Location: device-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Device Not Created";
        header("Location: device-create.php");
        exit(0);
    }
}

//user-device-create
if(isset($_POST['user-save_device']))
{
    $sno = mysqli_real_escape_string($con, $_POST['sno']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $assignedto = mysqli_real_escape_string($con, $_POST['assignedto']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $tag = mysqli_real_escape_string($con, $_POST['tag']);

    $query = "INSERT INTO device (sno,name,model,assignedto,department,state,tag) VALUES ('$sno','$name','$model','$assignedto','$department','$state','$tag')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Device Created Successfully";
        header("Location: user-device-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Device Not Created";
        header("Location: user-device-create.php");
        exit(0);
    }
}



if(isset($_POST['login']))
{
    //validate the inputs
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    // Get user input
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if(empty($email))
    {
        $_SESSION['message'] = "Email Required!!";
        header("Location: login.php?error= email required");
        exit();
    }
    else if(empty($password)){
        $_SESSION['message'] = "Passowrd Required!!";
        header("Location: login.php?error= Password required");
        exit();
    }
    else
    {
        
    // Verify login credentials
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    
    //&& password_verify($password, $row['password'])
    if (is_array($row) ) 
    {
        if($password === $row['password'])
        {
            // Login successful
            //$_SESSION['user_id'] = $row['id'];
            //$_SESSION['user_role'] = $row['role'];
            //check roles
            if($row['role'] === 'admin')
            {
                header("Location: admin-dashboard.php"); // Redirect to admin-dashboard page
            }else
            {
                header("Location: user-dashboard.php"); // Redirect to user-dashboard page
            }
            
        }
        
     else 
     {
        // Login failed
        $_SESSION['message'] = "Incorrect Username or Password";
        header("Location: login.php?error=1"); // Redirect to login page with error parameter
    }
    }
    }
    


}

if(isset($_POST['register']))
{
     //validate the inputs
     function validate($data)
     {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
     }
    
    // Get user input
    //$name = $_POST['name'];
    $email = validate($_POST['email']);
    $password1 = validate($_POST['password1']);
    $password2 = validate($_POST['password2']);
    $role = validate($_POST['role']);
    
    // Validate input fields
    // ...

    if(empty($email))
    {
        header("Location: register.php?error= email required");
        exit();
    }
    else if(empty($password1)){
        header("Location: register.php?error= Password required");
        exit();
    }
    else if(empty($password2))
    {
        header("Location: register.php?error= Password required");
        exit();
    }
    else if($password1 !== $password2)
    {
        header("Location: register.php?error= Password Mismatch");
        exit();
    }
    else
    {
         
        // Hash the password
        //$password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user into database
        $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$password1', '$role')";
        mysqli_query($con, $sql);
        
        // Redirect to login page
        header("Location: login.php");

    }
    
    
   
    if(isset($_POST['cancel'])) {
        header('Location: register.php');
        exit;
    }
}



?>