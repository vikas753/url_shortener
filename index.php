 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>

<html>

<body>

<h1>URL Shortener</h1>

<form action="./src/insert.php" method="post">
<?php echo " <b>Insert an Url</b><br><br>"; ?>
Url : <input type="text" name="url_name" /><br><br>
<input type="submit" />
</form>
<form action="./src/delete.php" method="post">
<?php echo " <b>Delete a short-url</b><br><br>"; ?>
Url : <input type="text" name="short_url_name" /><br><br>
<input type="submit" />
</form>
<form action="./src/display_data.php" method="post">
<?php echo " <b>Display data , click below </b><br><br>"; ?>
<input type="submit" />
</form>

</body>
</html>