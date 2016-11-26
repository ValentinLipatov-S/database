<?php
$dbconn = pg_connect("
	host     = ec2-54-235-89-113.compute-1.amazonaws.com
	dbname   = d4vrdl5cj9rncb
	user     = malouijarvdhsq
	password = tXOJrWYUOh-BTc-nQ5KxRa1V_N
")or die('Could not connect: ' . pg_last_error());
		
if($_GET['comand'] == 'create_database')
{
	$query = "CREATE TABLE database (data TEXT NOT NULL)";
	$result = pg_query($query) or die(pg_last_error());
}
if((($_GET["comand"] == 'set') and (isset($_GET["data"]))))
{
	$query = "INSERT INTO database (data) VALUES ('$_GET[data]')";
	$result = pg_query($query) or die(pg_last_error());
}
if((($_POST["comand"] == 'set') and (isset($_POST["data"]))))
{
	$query = "INSERT INTO database (data) VALUES ('$_POST[data]')";
	$result = pg_query($query) or die(pg_last_error());
}
if($_GET['comand'] == 'get')
{
	$query = "SELECT * FROM database";
	$result = pg_query($query) or die(pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
	{
		echo $line['data']
	}
}
if($_POST['comand'] == 'get')
{
	$query = "SELECT * FROM database";
	$result = pg_query($query) or die(pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
	{
		echo $line['data']
	}
}
pg_free_result($result);
pg_close($dbconn);
?>
