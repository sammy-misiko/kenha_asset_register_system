

<?php
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS --
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">-->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Registration</title>
</head>
<body>
    <div class = "container">
        <div class= "rows">
            <div class="cols-x1-12">
                <h1 class= "text-center pt-5"> Device Printout </h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Serial Number</th>
                            <th>Device Name</th>
                            <th>Device Model</th>
                            <th>Assigned To</th>
                            <th>Department</th>
                            <th>Device Condition</th>
                            <th>Device Tag</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM device";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['sno']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['model']; ?></td>
                            <td><?php echo $row['assignedto']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['state']; ?></td>
                            <td><?php echo $row['tag']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        
                    </tbody>
                </table>
                <div class="text-center">
                        <button onclick= "window.print()" class= "btn btn-primary">Print</button>
                </div>
            </div>
        </div>

    </div>
</body>