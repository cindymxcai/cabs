

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
																					status VARCHAR(20) )";

			 $result = @mysqli_query($conn, $query1);

 // Frees up the memory, after using the result pointer
			 mysqli_free_result($result);
	 }


	 // Set up the SQL command to add the data into the table
    $query2 = "insert into Bookings"
            ."(ref, name, phone, unit, streetnum, street, suburb, date, time, dropoff, status)"
            . "values"
        		."('$ref','$name','$phone','$unit', '$streetnum','$street','$suburb','$date','$time','$dropoff','unassigned')";

        // executes the query
        $result = mysqli_query($conn, $query2);
        // checks if the execution was successful
        if(!$result) {
            echo "<p>Something is wrong with ",	$query2, "</p>";
        } else {
            // display an operation successful message
            echo "Thanks ", $name,"! Your booking has been made! <br>
						Your reference number is: ",$ref," <br>
					 	Please wait outside ", $streetnum, $unit," ", $street ," ",$suburb, " at " ,$date, " ",$time;
        }
				//if successful query operation



				 // Frees up the memory, after using the result pointer
     mysqli_free_result($result);

     // close the database connection
     mysqli_close($conn);




 ?>
