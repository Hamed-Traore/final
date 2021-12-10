<?php
// Include db connecion file
require_once '../controllers/DB-connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Me | Candidates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_candidates.css">
    <script src="https://kit.fontawesome.com/7a845b8a2a.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <a href="../View/index.php" class="btn btn-secondary btn-sm pull-left"><i class="fas fa-arrow-circle-left"></i> Go Back</a><br><br>
                        <h2 class="pull-left">Candidates</h2>
                        <a href="staff_form.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Candidate</a>
                    </div>
                    <div>
                    	
                    </div>
                    <?php
                   
                    // Include db connecion file
                    
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM `staff`";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Full_name</th>";
                                        echo "<th>role</th>";
                                        echo "<th>phone number</th>";
                                        echo "<th>Status</th>";
                                        // echo "<th>Rawscore</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['staff_id'] . "</td>";
                                        echo "<td>" . $row['Full_name'] . "</td>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td>" . $row['phone_number'] . "</td>";
                                        echo "<td>" . $row['Status'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="delete.php?candidateID='. $row['staff_id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                    </div>
</div>
</div>
</div>

</body>
</html>


