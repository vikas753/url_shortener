<html>
<body>

<?php 
  define('LENGTH_OF_SHORT_URL', 5);
  // This function will return a random 
  // string of specified length 
  function random_strings($length_of_string) {     
    // md5 the timestamps and returns substring , uniqid helps to get an unique key
    // of specified length 
	
    return substr(md5(uniqid(rand(), true)), 0, $length_of_string); 
  }

  include '../sql/config.php';
  include 'file_template.php';

  // Escape user inputs for security
  $url_name = mysqli_real_escape_string($con , $_REQUEST['url_name']);
  $short_url_name = random_strings(LENGTH_OF_SHORT_URL);
  $short_url_link = "http://127.0.0.1/t_urls_db/".$short_url_name;
  
  // Attempt insert query execution
  $sql = "INSERT INTO url_shortener (Short_Url, Url, Short_Url_Link) VALUES ('$short_url_name','$url_name','$short_url_link')";
  if(mysqli_query($con, $sql)){
      
	  $folder = "../../t_urls_db/".$short_url_name;
      mkdir ($folder, 0777);
	  $filename = $folder."/index.php";
	  $myfile = fopen($filename, "x+") or die("Unable to open file!");
	  fwrite($myfile, get_file_template($short_url_name));
	  fclose($myfile);
	  echo "[url : ".$url_name." ]<br>";
	  echo "[short_url : ".$short_url_link." ]<br>";
	  echo "Records added successfully!";
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }

  mysqli_close($con);

?>

</body>
</html>