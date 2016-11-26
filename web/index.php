<?php
$dbconn = pg_connect("
	host     = ec2-54-75-230-140.eu-west-1.compute.amazonaws.com
	dbname   = d3fl3l4u9jn8jj
	user     = krbcignxgtxjei
	password = YorJUaA3ZunFSEPVlYQPa28uO4
")or die('Could not connect: ' . pg_last_error());
		
if($_GET['comand'] == 'create_database')
{
	$query = "CREATE TABLE database (data TEXT NOT NULL)";
	$result = pg_query($query) or die(pg_last_error());
}
if($_GET["comand"] == 'set' and isset($_GET["data"]))
{
	$query = "INSERT INTO database (data) VALUES ('$_GET[data]')";
	$result = pg_query($query) or die(pg_last_error());
}
if($_POST["comand"] == 'set' and isset($_POST["data"]))
{
	$query = "INSERT INTO database (data) VALUES ('$_POST[data]')";
	$result = pg_query($query) or die(pg_last_error());
}
if($_GET['comand'] == 'get')
{
	$text = ""
	$query = "SELECT * FROM database";
	$result = pg_query($query) or die(pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
	{
		$text .= $line['data'];
	}
	echo $text;
}
if($_POST['comand'] == 'get')
{
	$query = "SELECT * FROM database";
	$result = pg_query($query) or die(pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
	{
		$text .= $line['data'];
	}
	echo $text;
}
pg_free_result($result);
pg_close($dbconn);
?>
