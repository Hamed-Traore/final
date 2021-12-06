<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
}
require('../controllers/DB-connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HOME</title>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="view.css">
    <style>
        .wrapper{
            color:rgb(104,7,7)
        }
        table tr td{
            color:rgb(104,7,7)
        }

        table tr td:last-child{
            width: 70px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });

        // $.post(
            //     'results_page.php',
            //     {Search_term : document.getElementById('Search_term').value,
            //     submit:'yes'},
            //     function (data, status){
            //         alert("hello world");
            //     }
            // );
    </script>


        
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        
        
            <div class="container"  >
                    <center><?php echo "<h1>HOME</h1>"; ?>
                    <div class ="container ">
                        
                        
                    </div>
                    </center>
                    <?php
                    

                    // Attempt select query execution
                    $id=$_SESSION["user_id"];
                    $sql = "SELECT * FROM `events` WHERE users_id='$id'";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo '<thead>';
                            echo '<tr>';

                            echo '<th>creation_date</th>';
                            echo '<th>title</th>';
                            echo '<th>colours</th>';
                            echo '<th>Start_date</th>';
                            echo '<th>end_date</th>';
                            echo '<th>Cake_size</th>';
                            echo '<th>budget</th>';
                            echo '<th>Action</th>';
                            
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['creation_date'] . '</td>';
                                echo '<td>' . $row['title'] . '</td>';
                                echo '<td>' . $row['colours'] . '</td>';
                                echo '<td>' . $row['start_date'] . '</td>';
                                echo '<td>' . $row['end_date'] . '</td>';
                                echo '<td>' . $row['Cake_size'] . '</td>';
                                echo '<td>' . $row['budget'] . '</td>';

                                echo '<td>';

                                echo '<a href="update.php?event_id=' .
                                    $row['event_id'] .
                                    '" class="mr-3" title="Update Record" data-toggle="tooltip"data-bs-toggle="modal" data-bs-target="#updateModal"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?event_id=' .
                                    $row['event_id'] .
                                    '" class="mr-3" title="Delete Record" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#delete" ><span class="fa fa-trash"></span></a>';
                                echo '<a href="event_details.php?event_id=' .
                                    $row['event_id'] .
                                    '" >Details</a>';
                                echo '</td>';
                                echo '</tr>';
                                echo '
                                      <!-- update Modal -->
                                      <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              What type of changes would you like to make ?
                                            </div>
                                            <div class="modal-footer">

                                              
                                              <a href="update.php?event_id=' .$row['event_id'] . '" class="btn btn-primary">update event details</a>
                                              <a href="location_form.php?event_id=' .$row['event_id'] . '" class="btn btn-primary">Add location</a>
                                              <a href="guest_form.php?event_id=' .$row['event_id'] . '" class="btn btn-primary">Add guest list</a>
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No Event were found.</em></div>';
                        }
                    } else {
                        echo 'Oops! Something went wrong. Please try again later.';
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
                

    <!-- Modal -->
    <div id="delete" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?event_id='.$_GET['event_id']; ?>" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this this event?</h5>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Yes" name="yes" class="btn btn-danger"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
                            
            </div>
                    
        </div>
    </div>        
    

        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
        
    </body>
</html>