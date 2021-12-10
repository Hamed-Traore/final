<?php
require_once '../controllers/DB-connection.php';
 




// make sure the user submitted the form properly
if(isset($_POST["submit"])) {
    
    //grab the user detailss
    $Full_name=$_POST["Full_name"];
    $role=$_POST["role"];
    $salary=$_POST["salary"];
    $phone_number =$_POST["phone_number"];
    $Status=$_POST["Status"];

    
	//check if the user inserted all the required values
	    
	function emptyInputStaff($Full_name,$role,$salary,$phone_number,$Status){
	    $result;
	    if(empty($Full_name)||empty($role)||empty($salary)||empty($phone_number)||empty($Status)){
	        $result=true;
	    }
	    else {
	        header("location: staff_form.php?error= You have an emptyfield");
	    }
	    return $result;
	}  
	  
	  
	}  
	     


    

//     // //check if email structure is valid
//     // if(invalidEmail($email)!==false){
//     //     header("location: staff_form.php?error= Your email is Invalid");
//     //     exit();
//     // }

//     // //check if password matchs
//     // if(passworsMatch($password,$conf_password)!==false){
//     //     header("location: staff_form.php?error= Your passwors don't match") ;
//     //     exit();
//     // }

//     // //check if account already exist
//     // if(accountExist($conn,$email)!==false){
//     //     header("location: staff_form.php?error=You already have an account");
//     //     exit();
//     // }

//     // //check password lengh

//     // createAccount($conn,$firstname,$lastname,$email,$phone_number,$password);
// }
// else {
//     header("location: staff_form.php?error= connection Failed");
    
//     }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "register_style.css">
    <link rel="javascript" type="text/css" href="">
    
    <title>Add new staff</title>
</head>
    <body>
                
        <div class = "container" >
             <!-- ADD THIS ATTRIBUTE TO THE FORM TO ALSO VALIDATE WITH JAVASCRIPT BEFORE SUBMITTING TO BACKEND:
              onsubmit="return validateForm(event);" -->
                
            <form id="form" class="form" action="" method="post"  >
                        <h2>Add new staff</h2>
                        <h5 style="color: red;">
                            <?php
                                if (isset($_GET["error"])){
                                    echo $_GET["error"];
                                }
                            ?>
                        </h5><br>
                        <div class="form-control ">
                            <label for="firstname">Full name:</label>
                            <input type="text" id="firstname" name="Full_name">
                            <small id="firstnameError"></small>
                        </div>

                        <div class="form-control ">
                            <label for="lastname">role:</label>
                            <input type="text"  id="lastname" name="role">
                            <small id="lastnameError"></small>
                        </div>

                        <div class="form-control ">
                            <label for="email">salary:</label>
                            <input type="email"  id="email" name="salary">
                            <small id="emailError"></small>
                        </div>

                        <div class="form-control">
                            <label for="phone_number">Mobile number:</label>
                            <input type="text" id="phone_number" name="phone_number">
                            <small id="phone_numberError"></small>
                        </div>

                        <div class="form-control">
                            
                            <input type="hidden" id="password" name="Status" value="Not working">
                            <button type="submit" class="btn btn-primary" name="submit">Create account</button><br>
                        </div>

                        
                        </div>
                        

                        
            </form>
                
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./register_form.js"></script>
        
    </body>

</html>



