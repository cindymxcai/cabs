<?php

require_once ("../../../conf/settings.php");

     $conn = @mysqli_connect($host, $user, $pswd, $dbnm);

  	 //validation

    //  date_default_timezone_set('Pacific/Auckland');
      //$today = date('Y-m-d');
      //$now = date('H:i:s');
      $getBookings = "select * from Bookings";

      //validates and gives message if the table exists
      $result = @mysqli_query($conn, $getBookings);

          echo "<br><br>";
          echo "<table border = 1 class='atable'>";
          echo "<tr>";
          echo "<th>reference Code</th>";
          echo "<th>Name</th>";
          echo "<th>Phone</th>";
          echo "<th>Suburb</th>";
          echo "<th>Dropoff</th>";
          echo "<th>Date</th>";
          echo "<th>Time</th>";
          echo "</tr>";


          while ($row = mysqli_fetch_assoc($result))
          {
              echo "<tr>";
              echo "<td>",$row['ref'],"</td>";
              echo "<td>",$row['name'],"</td>";
              echo "<td>",$row['phone'],"</td>";
              echo "<td>",$row['suburb'],"</td>";
              echo "<td>",$row['dropoff'],"</td>";
              echo "<td>",$row['date'],"</td>";
              echo "<td>",$row['time'],"</td>";
              echo "</tr>";
          }

echo "</table>";

    mysqli_free_result($result);

    // close the database connection
    mysqli_close($conn);

?>
