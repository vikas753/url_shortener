<html>
<body>

<?php 

  include '../sql/config.php';

  // Escape user inputs for security
  $short_url_link = mysqli_real_escape_string($con , $_REQUEST['short_url_name']);

  // Attempt delete query execution
  $sql = "DELETE FROM url_shortener WHERE Short_Url_link = '".$short_url_link."'";
  if(mysqli_query($con, $sql)){
	echo "[short_url : ".$short_url_link." ]<br>";
	echo "Records Deleted successfully ! ";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }

  mysqli_close($con);

?>

</body>
</html>