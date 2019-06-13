<?php
//Cindy Cai 16938610 processes the admin assign booking area
require_once ("../../../conf/settings.php");

$conn = @mysqli_connect($host, $user, $pswd, $dbnm)
	 or die("Failed to connect to DB");



	 				//takes in input
      	 $bref = $_GET['number'];


         // query database for bookings that match input
         $query3 = "select * from Bookings
                    where ref = '$bref'";

         $result = @mysqli_query($conn, $query3);
        $row = mysqli_fetch_row($result);

//produces error message or updates bookings to assigned

if(!$row){
echo "No bookings under that reference number :(";
}
else {
echo "Taxi has been sent out for booking #",$bref, "!";
$query4 = "Update Bookings set status = 'assigned' where ref = '$bref'";
 @mysqli_query($conn, $query4);

}
    ?>
