<html>
<head>
	<title>CabsOnline</title>
	<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
	<script type="text/javascript" src="xhr.js"></script>
    <script type="text/javascript" src="simpleajax.js"> </script>

</head>
<body>

	<div class="top-menu">
		<nav class="nav-menu">
			<a class="menu-a" href="index.html">Home</a>
			<a class="menu-a" href="booking.html">Booking</a>
			<a class="menu-a" href="admin.html">Admin</a>
		</nav>
	</div>
	<div>

<?php


require_once ("../../../conf/settings.php");

$conn = @mysqli_connect($host, $user, $pswd, $dbnm)
	 or die("Failed to connect to DB");

	 $name = $_POST['name'];
	$phone = $_POST['phone'];
	$unit = $_POST['unit'];
	$streetnum = $_POST['streetnum'];
	$street = $_POST['street'];
	$suburb = $_POST['suburb'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$dropoff = $_POST['dropoff'];
	$ref = $_POST['ref'];

	 $query1 = "SHOW TABLES LIKE 'Bookings'";
    $result = @mysqli_query($conn, $query1);
    if (mysqli_num_rows($result)>0){
        echo"Success!";
    }


		//create table
	 else{
 // Frees up the memory, after using the result pointer
			 mysqli_free_result($result);

			 $query1  = "CREATE TABLE Bookings (name VARCHAR(40) NOT NULL
			 , phone VARCHAR(40), unit VARCHAR(10), streetnum VARCHAR(10), street VARCHAR(40)
			 , suburb VARCHAR(40), date DATE, time Time, dropoff VARCHAR(40) )";

			 $result = @mysqli_query($conn, $query1);

 // Frees up the memory, after using the result pointer
			 mysqli_free_result($result);
	 }

	 
	 // Set up the SQL command to add the data into the table
    $query2 = "insert into Bookings"
            ."(name, phone, unit, streetnum, street, suburb, date, time, dropoff)"
            . "values"
        ."('$name','$phone','$unit', '$streetnum','$street','$suburb','$date','$time','$dropoff')";

        // executes the query
        $result = mysqli_query($conn, $query2);
        // checks if the execution was successful
        if(!$result) {
            echo "<p>Something is wrong with ",	$query2, "</p>";
        } else {
            // display an operation successful message
            echo "<p>Your booking has been made!</p>";
        } // if successful query operation

     // Frees up the memory, after using the result pointer
     mysqli_free_result($result);

     // close the database connection
     mysqli_close($conn);

 ?>



</body>
</html>
