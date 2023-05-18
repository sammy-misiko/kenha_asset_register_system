<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>ICT Device</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                    <!-- search form -->
                <div>
                    <a href="index.php" class="btn btn-primary float-end">Logout</a>
                        <form method="GET" action="search.php">
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit">Search</button>
                        </form>
                </div>
                    
                    <div class="card-header">
                        <h4>Device Details
                            <a href="device-create.php" class="btn btn-primary float-end">Add Device</a>
                        </h4>
                    </div>
                    
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
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
                                    //$query_run = mysqli_query($con, $query);

                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $device)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $device['sno']; ?></td>
                                                <td><?= $device['name']; ?></td>
                                                <td><?= $device['model']; ?></td>
                                                <td><?= $device['assignedto']; ?></td>
                                                <td><?= $device['department']; ?></td>
                                                <td><?= $device['state']; ?></td>
                                                <td><?= $device['tag']; ?></td>
                                                <td>
                                                    <a href="device-view.php?id=<?= $device['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="device-edit.php?id=<?= $device['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_device" value="<?=$device['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>

                
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>