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

    <title>Device Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Device Edit 
                            <a href="admin-dashboard.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $device_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM device WHERE id='$device_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $device = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="device_id" value="<?= $device['id']; ?>">

                                    <div class="mb-3">
                                        <label>Serial Number</label>
                                        <input type="text" name="sno" value="<?=$device['sno'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Device Name</label>
                                        <input type="text" name="name" value="<?=$device['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Device Model</label>
                                        <input type="text" name="model" value="<?=$device['model'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Assigned To</label>
                                        <input type="text" name="assignedto" value="<?=$device['assignedto'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Department</label>
                                        <input type="text" name="department" value="<?=$device['department'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Device Condition</label>
                                        <input type="text" name="state" value="<?=$device['state'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Device Tag</label>
                                        <input type="text" name="tag" value="<?=$device['tag'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_device" class="btn btn-primary">
                                            Update Device
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>