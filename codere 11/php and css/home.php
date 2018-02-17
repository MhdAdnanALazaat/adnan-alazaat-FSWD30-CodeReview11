<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" type="text/css" href="css/style2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
    crossorigin="anonymous"></script>   
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php

 ob_start();

 session_start();

 require_once 'dbconnect.php';

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {

  header("Location: index.php");

  exit;

 }

 // select logged-in users detail

 $res=mysqli_query($conn, "SELECT * FROM users WHERE `user_id`=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['email']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style4.css">
<script src="js/home.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <nav class="navbar navbar-inverse bg-inverse">
   <a class="navbar-brand" href="#">cars CodeFactory</a>
   <button class="btn btn-info btn-lg" type="button" ><a href="logout.php?logout">Sign Out</a>
   <span class="glyphicon glyphicon-log-out"></span></button>
   <p class="h2"> Hi' <?php echo $userRow['email']; ?></p>
 
</nav>

<table class="table table-hover table-dark">
<thead class="thead-dark">   



<button class="btn btn-primary btn-lg btn-block" onclick="showofficelist()">Office List</button>
<p id="demo"></p>

<button class="btn btn-primary btn-lg btn-block" onclick="showcarslist()">cars List</button>
<p id="demo2"></p>

<button class="btn btn-primary btn-lg btn-block" onclick="loca()">locations cars</button>
<p id="number"></p>

<button class="btn btn-primary btn-lg btn-block" onclick="allcars()">all cars</button>
<p id="allcars"></p>

<script>
function showofficelist(){
        var obj, dbParam, xmlhttp;


        obj = { "table":"php_car_rental_agency"}; // Define an object containing a table property and a limit property

        dbParam = JSON.stringify(obj); // Convert the Object into a JSON

        xmlhttp = new XMLHttpRequest();


        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("demo").innerHTML = this.responseText;

            }

        };


        xmlhttp.open("GET", "office_list.php?office=" + dbParam, true); // Send a request to the PHP file, with the JSON string as a parameters

        xmlhttp.send(); // Display the result received from the PHP file
}

function showcarslist(){
        var obj, dbParam, xmlhttp;


        obj = {}; // Define an object containing a table property and a limit property

        dbParam = JSON.stringify(obj); // Convert the Object into a JSON

        xmlhttp = new XMLHttpRequest();


        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("demo2").innerHTML = this.responseText;

            }

        };


        xmlhttp.open("GET", "cars_list.php?cars=" + dbParam, true); // Send a request to the PHP file, with the JSON string as a parameters

        xmlhttp.send(); // Display the result received from the PHP file
}

function loca(){
        var obj, dbParam, xmlhttp;


        obj = {}; // Define an object containing a table property and a limit property

        dbParam = JSON.stringify(obj); // Convert the Object into a JSON

        xmlhttp = new XMLHttpRequest();


        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("number").innerHTML = this.responseText;

            }

        };


        xmlhttp.open("GET", "cars_locations.php?loca=" + dbParam, true); // Send a request to the PHP file, with the JSON string as a parameters

        xmlhttp.send(); // Display the result received from the PHP file
}


function allcars(){
        var obj, dbParam, xmlhttp;


        obj = {}; // Define an object containing a table property and a limit property

        dbParam = JSON.stringify(obj); // Convert the Object into a JSON

        xmlhttp = new XMLHttpRequest();


        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("allcars").innerHTML = this.responseText;

            }

        };


        xmlhttp.open("GET", "allcars.php?allcars=" + dbParam, true); // Send a request to the PHP file, with the JSON string as a parameters

        xmlhttp.send(); // Display the result received from the PHP file
}
</script>
           
            

         
           

       </table>
     </thead>

</div>
</body>

</html>

<?php ob_end_flush(); ?>