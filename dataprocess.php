

<?php


require_once ("../../../conf/settings.php");

$conn = @mysqli_connect($host, $user, $pswd, $dbnm)
	 or die("Failed to connect to DB");

	 //validation

	 if(!$conn){
		 echo "Failed to connect";

	 }
		else {

	// generate booking reference number
	$ref = "";
	for ($i=0; $i<4; $i++) {
		$ref .= (string)rand(0,9);
	}

	date_default_timezone_set('Pacific/Auckland');
$bdate = date('Y-m-d H:i:s');

	 $name = $_POST['name'];
	$phone = $_POST['phone'];
	$unit = $_POST['unit'];
	$streetnum = $_POST['streetnum'];
	$street = $_POST['street'];
	$suburb = $_POST['suburb'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$dropoff = $_POST['dropoff'];



 // Frees up the memory, after using the result pointer
			 mysqli_free_result($result);

			 $query1  = "CREATE TABLE if not exists Bookings (ref VARCHAR(6) NOT NULL UNIQUE,
			 																		name VARCHAR(40) NOT NULL,
			 																		phone VARCHAR(40),
																					unit VARCHAR(10),
																					streetnum VARCHAR(10),
																					street VARCHAR(40),
			 																		suburb VARCHAR(40),
																					date DATE,
																					time Time,
																					dropoff VARCHAR(40),
																					status VARCHAR(20),
																				 	bdate DateTime)";

			 $result = @mysqli_query($conn, $query1);

 // Frees up the memory, after using the result pointer
			 mysqli_free_result($result);
	 }


	 // Set up the SQL command to add the data into the table
    $query2 = "insert into Bookings"
            ."(ref, name, phone, unit, streetnum, street, suburb, date, time, dropoff, status, bdate)"
            . "values"
        		."('$ref','$name','$phone','$unit', '$streetnum','$street','$suburb','$date','$time','$dropoff','unassigned','$bdate')";

        // executes the query
        $result = mysqli_query($conn, $query2);
        // checks if the execution was successful
        if(!$result) {
            echo "<p>Something is wrong with ",	$query2, "</p>";
        } else {
            // display an operation successful message
    
						?>
						<head>
							<title>CabsOnline</title>
							<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
							<script type="text/javascript" src="bookprocess.js"> </script>
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
									<h1>Booking</h1>
							</div>
							<div class = "success">
						<?php

							echo "Thanks ", $name,"! Your booking has been made! <br>
							Your reference number is: ",$ref," <br>
							Please wait outside ", $streetnum, $unit," ", $street ," ",$suburb, " at " ,$date, " ",$time;


							 // Frees up the memory, after using the result pointer
					 mysqli_free_result($result);

					 // close the database connection
					 mysqli_close($conn);
					 ?>
					</div>
					 </html>

<?php

        }
				//if successful query operation




 ?>
