<?php
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

    <title>Device Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Device Add 
                            <a href="admin-dashboard.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Serial Number</label>
                                <input type="text" name="sno" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Device Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Device Model</label>
                                <input type="text" name="model" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Assigned To</label>
                                <input type="text" name="assignedto" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Department</label>
                                <input type="text" name="department" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Device Condition</label>
                                <input type="text" name="state" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Device Tag</label>
                                <input type="text" name="tag" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_device" class="btn btn-primary">Save Device</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>