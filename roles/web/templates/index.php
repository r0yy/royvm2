<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<title>Ansible self service</title>
</head>
<body>
<h1>Dank voor het kiezen van dit product</h1>
<p>Dit is Webserver: <?php echo gethostname(); ?></p>

<p>{{ ansible_managed }}</p>


<?php

// database credentials (defined in group_vars/all)
$dbname = "dbtest";
$dbuser = "dbuser";
$dbpass = "password";
$dbhost = "10.0.0.5";

// query templates
$create_table = "CREATE TABLE IF NOT EXISTS `royvm2` (
   `id` int(11) unsigned NOT NULL auto_increment,
   `title` varchar(255) NOT NULL default '',
   `content` text NOT NULL default '',
   PRIMARY KEY  (`id`)
   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$select_royvm2 = 'SELECT * FROM royvm2';

// opzetten
$link = mysql_connect($dbhost, $dbuser, $dbpass)
    or die('Could not connect: ' . mysql_error());
echo "Connected successfully\n<br />\n";
mysql_select_db($dbname) or die('Could not select database');

// tabel genereren
$result = mysql_query($create_table) or die('Create Table failed: ' . mysql_error());

// wegschrijven
if (isset($_POST["title"])) {
    $result = mysql_query("insert into royvm2 (title, content) values ('".$_POST["title"]."', '".$_POST["content"]."')") or die('Create Table failed: ' . mysql_error());
}

// Performing SQL query
$result = mysql_query($select_royvm2) or die('Query failed: ' . mysql_error());

// foreach om weer te geven
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>

<form method="post">
Title: <input type="text" name="title"><br />
Message: <textarea name="content"></textarea><br />
<input type="submit" value="Post message">
</form>





</body>
</html>
