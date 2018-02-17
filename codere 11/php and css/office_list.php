<!DOCTYPE html>
<html>
<head>
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
<table class="table table-hover table-dark">

<?php

		 include_once 'dbconnect.php';
        header("Content-Type: application/json; charset=UTF-8");

        $obj = json_decode($_GET["office"], false); // Convert the request into an object


       

        $result = $conn->query("SELECT php_car_rental_agency.PHP_car_rental_agency_id, php_car_rental_agency.name  ,address.zip_code,address.City,address.Country,address.strasse FROM " .$obj->table. " INNER JOIN address on php_car_rental_agency.fk_address_id = address.address_id");

        $outp = array(); // create an empty array

        $outp = $result->fetch_all(MYSQLI_ASSOC); // fill an array with the requested data and store it in the array
        echo "<class = 'table table-hover table-dark' table border='1' align='center' width='70%'><tr><td> id</td><td>  name</td><td>zip code</td><td>city</td><td>Country</td><td>strasse</td></tr>";
foreach($outp as $row){
              echo "<tr><td>";
                echo $row['PHP_car_rental_agency_id'];
                echo "</td><td>";
                echo $row['name'];
                echo "</td><td>";
                echo $row['zip_code'];
                
                echo "</td><td>";
                echo $row['City'];
                echo "</td><td>";
                echo $row['Country'];
                echo "</td><td>";
                echo $row['strasse'];
                echo "</td></tr>";

       }
       echo "</table>";

?>

</table>
</body>
</html>
