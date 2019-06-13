<?php

//Cindy Cai 16938610 processes the admin display pick up requests

require_once ("../../../conf/settings.php");

     $conn = @mysqli_connect($host, $user, $pswd, $dbnm);

  	 //validation for time to find bookings in the next 2 hours and unassigned

     date_default_timezone_set('Pacific/Auckland');
      $today = date('Y-m-d');
      $now = date('H:i:s');
      $now2 = date('H:i:s ', strtotime($now)+7200);
      $getBookings = "select ref, name, phone, suburb, dropoff, date, time from Bookings
      WHERE status = 'unassigned'
      AND date = '$today'
      AND time BETWEEN '$now' and '$now2'
      ";

      //validates and gives message if the table exists
      $result = @mysqli_query($conn, $getBookings);

          echo "<table border = 1 class='atable'>";
          echo "<tr>";
          echo "<th>Reference Code</th>";
          echo "<th>Name</th>";
          echo "<th>Phone</th>";
          echo "<th>Suburb</th>";
          echo "<th>Dropoff</th>";
          echo "<th>Date</th>";
          echo "<th>Time</th>";
          echo "</tr>";
//prints to table if bookings in the next two hours and unassigned are found

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

//frees result

    mysqli_free_result($result);

    // close the database connection
    mysqli_close($conn);

?>
