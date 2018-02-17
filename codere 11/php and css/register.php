<?php

 ob_start();

 session_start(); // start a new session or continues the previous

 if( isset($_SESSION['user'])!="" ){

  header("Location: home.php"); // redirects to home.php

 }

 include_once 'dbconnect.php';


 $error = false;


 if ( isset($_POST['btn-signup']) ) {

 

  // sanitize user input to prevent sql injection

  $first_name = trim($_POST['first_name']);

  $first_name = strip_tags($first_name);

  $first_name = htmlspecialchars($first_name);


  $last_name = trim($_POST['last_name']);

  $last_name = strip_tags($last_name);

  $last_name = htmlspecialchars($last_name);

 

  $email = trim($_POST['email']);

  $email = strip_tags($email);

  $email = htmlspecialchars($email);

 

  $pass = trim($_POST['pass']);

  $pass = strip_tags($pass);

  $pass = htmlspecialchars($pass);

 

  // basic first name validation

  if (empty($first_name)) {

   $error = true;

   $first_nameError = "Please enter your first name.";

  } else if (strlen($first_name) < 3) {

   $error = true;

   $first_nameError = "Name must have atleat 3 characters.";

  } else if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {

   $error = true;

   $first_nameError = "Name must contain alphabets and space.";

  }



  // basic last name validation

  if (empty($last_name)) {

   $error = true;

   $last_nameError = "Please enter your last name.";

  } else if (strlen($last_name) < 3) {

   $error = true;

   $last_nameError = "Name must have atleat 3 characters.";

  } else if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {

   $error = true;

   $last_nameError = "Name must contain alphabets and space.";

  }

 

  //basic email validation

  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {

   $error = true;

   $emailError = "Please enter valid email address.";

  } else {

   // check whether the email exist or not

   $query = "SELECT email FROM users WHERE email='$email'";

   $result = mysqli_query($conn, $query);

   $count = mysqli_num_rows($result);

   if($count!=0){

    $error = true;

    $emailError = "Provided Email is already in use.";

   }

  }


  // password validation

  if (empty($pass)){

   $error = true;

   $passError = "Please enter password.";

  } else if(strlen($pass) < 6) {

   $error = true;

   $passError = "Password must have atleast 6 characters.";

  }

 

  // password encrypt using SHA256();

  $password = hash('sha256', $pass);

 

  // if there's no error, continue to signup

  if( !$error ) {

   

   $query = "INSERT INTO users(first_name,last_name,email,password) VALUES('$first_name', '$last_name', '$email','$password')";

   $res = mysqli_query($conn, $query);

   

   if ($res) {

    $errTyp = "success";

    $errMSG = "Successfully registered, you may login now";

    unset($first_name);

    unset($last_name);

    unset($email);

    unset($pass);

   } else {

    $errTyp = "danger";

    $errMSG = "Something went wrong, try again later...";

   }

   

  }

 

 

 }

?>

<!DOCTYPE html>

<html>

<head>

<title>Login & Registration System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/38/Wikipedia_User-ICON_byNightsight.png"> </h5>
                    <div class="form-group">
                        <div class="input-group">


    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

   

       


             <h2>Sign Up.</h2>

             <hr />


           

            <?php

   if ( isset($errMSG) ) {

   

    ?>


             <div class="alert">

 <?php echo $errMSG; ?>

             </div>

 <?php

   }

   ?>

  <input type="text" name="first_name" class="form-control" placeholder="Enter first Name" maxlength="50" value="<?php echo $first_name ?>" />

       

                <span class="text-danger"><?php echo $first_nameError; ?></span>

                <input type="text" name="last_name" class="form-control" placeholder="Enter last Name" maxlength="50" value="<?php echo $last_name ?>" />

       

                <span class="text-danger"><?php echo $last_nameError; ?></span>

   <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />

     

                <span class="text-danger"><?php echo $emailError; ?></span>

           <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />

                <span class="text-danger"><?php echo $passError; ?></span>
      <hr />

     <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>


             <hr />
   <a href="index.php">Sign in Here...</a>

       </form>
     </div>
   </div>
 </div>
</div>
</div>
</body>

</html>

<?php ob_end_flush(); ?>
