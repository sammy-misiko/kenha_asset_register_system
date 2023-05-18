
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="css/imag.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <title>Device Search View</title>
</head>
<body id="body">

<div class = "container">
        <div class= "rows">
            <div id="cont" class="cols-x1-12">
                <?php date_default_timezone_set('Africa/Nairobi') ?>
                <div class ="imgg">
		                <img src="img/kena.png" alt="Centered Image">
	              </div>
                <h1 class= "text-center pt-5"> R2-Asset Register As At<br> </h1>
                <h3 class="text-center pt4"> <?php echo date('d-m-y'); echo(" : ");  echo date('h-i-s a');?></h3>
                <table id="table" class="table table-bordered">
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
// Connect to the database
//$conn = mysqli_connect("localhost", "username", "password", "database");

// Get the search term from the form
$searchTerm = mysqli_real_escape_string($con, $_GET['search']);

// Build the SQL query
$sql = "SELECT * FROM device WHERE name LIKE '%{$searchTerm}%'";

// Execute the query
$result = mysqli_query($con, $sql);


// Check if any results were found
if (mysqli_num_rows($result) > 0) 
{



  // Display the results in a table
 // echo "<table>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>" . $row["sno"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["model"] . "</td>
        <td>" . $row["assignedto"] . "</td>
        <td>" . $row["department"] . "</td>
        <td>" . $row["state"] . "</td>
        <td>" . $row["tag"] . "</td>
    </tr>";
  }
 // echo "</table>";
} else {
  // Display a message if no results were found
  echo "No results found.";
}

// Close the database connection
mysqli_close($con);
?>

</tbody>
</table>
</div>
    <div class="text-center">
          <button onclick= "printPage()" class= "btn btn-primary">Print</button>
    </div>
</div>
</div>
</body>

<!-- printing script -->


<script type = "text/javascript">
    function printPage()
    {
      var body = document.getElementById('body').innerHTML;
      var data = document.getElementById('cont').innerHTML;
      document.getElementById('body').innerHTML = data;
      window.print();
    }
    
</script>
