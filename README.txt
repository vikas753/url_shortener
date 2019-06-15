###############################
#  INSTALLATION GUIDE
###############################

1 . Download Xampp or any other utility to setup localhost
2 . Setup an Apache server to establish a SQL query server
3 . Modify the <root>/src/config.php to suit the credentials of sql server
3 . Create the table called 'url_shortener' on above DB , with columns
      Short_Url_Link ( TEXT ) , Url ( TEXT ) , Hit_Rate ( INT )
4 . Create a directory called as 't_urls_db' on the root directory ( say alongwith root : url_shortener - where index.php will reside) so that code wont break
5 . End of installation , we can start with tool usage

###############################
#  Design 
###############################

1 . Insert
    1 . i )   Post the URL to be shortened via form - action
	1 . ii )  Generate a MD5+UNIQ_ID hashed short_url key
	1 . iii ) Make a directory with above key in <root>/t_urls_db/<short_url_key>
	1 . iv )  Create a file 'index.php' in above directory , so that short_url_link will trigger this file for redirection
	1 . v )   Flush the file_template_php code from <root>/src/file_template.php onto the file created in step iv
	1 . vi )  Template does necessary security checks for existence of short url and increment hit_rates . 
	             It also helps in 302 or temporary redirection using 'header' request to Url_Id
	1 . vii ) Update the database with short_url using subsquent query

2 . Delete
      It is a sql query to delete the records based on user input
	
3 . Display
      It is a sql query to display the records in a table format
	
###############################
#  Limitations
###############################

1 . Short url key is limited to a length of 5
2 . Need to weigh the delta of md5 vs sha1 to resolve collisions
3 . UI is very basic , need to scope out any fancy stuff if needs to be added
4 . See if any customized short_url and be chimed-in to improve user experience
