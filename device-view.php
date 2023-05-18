<?php
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

    <title>Devices View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Device View Details 
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
                                
                                    <div class="mb-3">
                                        <label>Serial Number</label>
                                        <p class="form-control">
                                            <?=$device['sno'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Device Name</label>
                                        <p class="form-control">
                                            <?=$device['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Device Model</label>
                                        <p class="form-control">
                                            <?=$device['model'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Assigned To</label>
                                        <p class="form-control">
                                            <?=$device['assignedto'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Department</label>
                                        <p class="form-control">
                                            <?=$device['department'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Device Condition</label>
                                        <p class="form-control">
                                            <?=$device['state'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Device Tag</label>
                                        <p class="form-control">
                                            <?=$device['tag'];?>
                                        </p>
                                    </div>

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