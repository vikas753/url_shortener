<html>
<body>

<?php 

  include '../sql/config.php';

  $query = "SELECT * FROM url_shortener"; //You don't need a ; like you do in SQL
  $result = mysqli_query($con , $query);

  echo "<table>"; // start a table tag in the HTML
  if($query)
  {
    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tr><td> <b>Short_Url_Link</b> : " . $row['Short_Url_Link'] . "</td><td>   <b>Url</b> : " . $row['Url'] . "</td><td>   <b>Hit_Rate</b> : " . $row['Hit_Rate'] . " </td></tr>";  
    }
  }

  echo "</table>"; //Close the table in HTML
  mysqli_close($con);

?>

</body>
</html>