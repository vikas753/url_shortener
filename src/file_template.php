<?php 

// This file needs to be called with an active connection included before and checked thoroughly 
  function get_file_template($short_url) {     
// Dont worry about tabs or inlining in the string below since it is a raw php code which would be used for 302 redirection
    $file_code = "<?php
  include '../../url_shortener/sql/config.php';
  define('HIT_RATE', 20);
  \$sql_f_t = 'SELECT Url , Hit_Rate FROM url_shortener WHERE Short_Url = \"".$short_url."\"';
  \$result_f_t = mysqli_query(\$con, \$sql_f_t);
  if (mysqli_num_rows(\$result_f_t) == 1){
    \$row_f_t = mysqli_fetch_assoc(\$result_f_t);
    if(\$row_f_t['Hit_Rate'] < HIT_RATE){ 
	  error_reporting(E_ALL);
	  ini_set('display_errors', 'On');
	  ob_start();
	  echo 'Redirecting : '.\$row_f_t['Url'];
	  \$new_hit_rate_f_t= \$row_f_t['Hit_Rate'] + 1;
	  \$sql_new_f_t = 'UPDATE url_shortener SET Hit_Rate = '.\$new_hit_rate_f_t.' WHERE Short_Url = \"".$short_url."\"';
	  \$result_f_t = mysqli_query(\$con, \$sql_new_f_t);
	  if(\$result_f_t)
	  {
	    header('Location:'.\$row_f_t['Url']); 
	  }
	  ob_end_flush();
	  exit();
	}
	else{
	  echo ' Hit Rate for this short url exceeds 20 , resetting it for now ';
	  \$new_hit_rate_f_t = 0;
	}
	\$sql_new_f_t = 'UPDATE  url_shortener SET Hit_Rate = \$new_hit_rate_f_t WHERE Short_Url = \"".$short_url."\"';
    \$result_f_t = mysqli_query(\$con, \$sql_new_f_t);
  }
  else{
    echo ' Short Url Deleted or Doesnt exist ! ';
  }
?>";
  return $file_code;
  }
?>
