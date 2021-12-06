<?php
//error connection and functions file
require_once '../controllers/DB-connection.php';
require_once '../controllers/functions.php';
//error handler
$errors= array();

if (isset($_POST['Update'])) 
{
    $event_type= $_POST['event_type'];
    $title= $_POST['title'];
    $colours= $_POST['colours'];
    $start_date= $_POST['start_date'];
    $end_date= $_POST['end_date'];
    $budget= $_POST['budget'];
    $cake_size= $_POST['cake_size'];
    $event_details= $_POST['event_details']; 

    // validation code
    // since i used the attribute required in the htlm I don't need to check for empty input

    //ckeck length to make the length of the input matchs the length definied in the database 
    if(strlen($title)>50)
    {
        array_push($errors,"The event name must be less than 50 characters");
    }
    if (strlen($colours)>50)
    {
        array_push($errors,"The colours must be less than 50 characters");
    }
    // compare the starting and ending dates
    if (strlen($start_date>$end_date))
    {
        array_push($errors,"The starting date cannot be later than the ending date");
    }
    if(!intval($budget))
    {
        array_push($errors,"The budget field must contain numbers only");
    }

    session_start();
    if (count($errors)==0) 
    {
        // if there is no error in the input, store the data in the DB
        $event_id=$_GET['event_id'];
        Update_event($conn,$event_type,$title,$colours,$start_date,$end_date,$cake_size,$budget,$event_details,$event_id);
    }
    // return the errors on the form page
    else 
    {
        
        // store the errors inside session
        $_SESSION["errors"] = $errors;
        header("location: ../View/createEvent_form.php?error= connection Failed");
    
    }
}

// Fill the field to avoid making the user fill every required field again
if (isset($_GET['event_id']) && !empty(trim($_GET['event_id']))) 
{
    // Get URL parameter
    $event_id = trim($_GET['event_id']);
    // sql query to select the all from table event
    $sql= "SELECT * FROM `events` WHERE event_id= '$event_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) 
    {
        /* Fetch result row as an associative array. Since the result set
        contains only one row, we don't need to use while loop */
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        // Retrieve individual field value
        $event_type= $row['event_type'];
        $title= $row['title'];
        $colours= $row['colours'];
        $start_date= $row['start_date'];
        $end_date= $row['end_date'];
        $budget= $row['budget'];
        $cake_size= $row['Cake_size'];
        
        
        $event_details= $row['event_details'];
        mysqli_close($conn);
        
    }
    else 
    {
        // URL doesn't contain valid id. Redirect to error page
        header('location: Update.php?error=Something is wrong');
        exit();
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="createEvent.css">
</head>
<body style="background-color: wheat;">




<!--code for form-->
     
  <section  id="cover" class="min-vh-100">
    <div id="cover-caption" >
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="">Update the event</h1>
                    <?php
                        if(isset($_SESSION["errors"])){
                            $errors = $_SESSION["errors"];
                            // loop through errors and display them
                            foreach($errors as $error){
                                ?>
                                    <small style="color: red"><?= $error."<br>"; ?></small>
                                <?php
                            }
                        }
                        // destroy session after displaying errors
                        $_SESSION["errors"] = null;
                    ?>
                    <div class="px-2"><br>
                        <form action="" class="justify-content-center" method="POST">
                            <div class="form-group">
                              <label>Event Category</label>
                            <select class="form-select" name="event_type"  required>
                                  <option disabled selected value="<?php echo $event_type; ?>">Event Category</option>
                                  <option value="Private">Private</option>
                                  <option value="Corporate">Corporate</option>
                                  <option value="Charity">Charity</option>
                                  <option value="Others">Others</option>

                              </select>
                            </div>
                            <div class="form-group">
                                <label>Event Name:</label>
                                <input type="text" class="form-control" value="<?php echo $title; ?> " name="title" required>
                            </div>
                            <div class="form-group">
                                <label>Colours of the event:</label>
                                <input type="text" class="form-control" value="<?php echo $colours; ?>" name="colours" placeholder="Ex: red-blue-black" required>
                            </div>


                            <div class="form-group">
                                <label>Event starting date:</label>
                                <input type="date" class="form-control" value="<?php echo $start_date; ?>" name="start_date" required>
                            </div>
                           

                            <div class="form-group">
                                <label>Event ending date:</label>
                                <input type="date" class="form-control" value="<?php echo $end_date; ?>" name="end_date" required>
                            </div>
                             <div class="form-group">
                                <label>If you want a cate, please select the size:</label>
                                <select class="form-select"  name="cake_size" >
                                    <option value="null">Cake size</option>
                                    <option value="Large">Large</option>
                                    <option value="Meduim">Meduim</option>
                                    <option value="Small">Small</option>
                                </select>
                            </div>
                            

                            <div class="form-group">

                                <label>Budget:</label> <br>
                                <input type="text" class="form-control" value="<?php echo $budget; ?>" name="budget" placeholder="numbes only..." required>
                            </div>
                            <div class="form-group">

                                <label>Event Details:</label> <br>
                                <input type="textarea" class="form-control" value="<?php echo $event_details; ?>" name="event_details" placeholder="300 characters max...">
                            </div>

                            
                            <button type="submit" name="Update" class="btn btn-primary">Update</button>
                            <a href="home.php" class="btn btn-secondary ml-2">Cancel</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
