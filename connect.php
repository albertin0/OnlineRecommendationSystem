<?php

/*mysql_connect("localhost","root","password");
mysql_select_db("CollegeProject");*/

$link = mysql_connect('localhost', 'root', 'password');
if (!$link) {
	die('<h2>Could not connect: ' . mysql_error().'</h2>');
}
//echo '<h2>Connected successfully to db</h2>';
          
//mysql_connect("localhost","root@localhost","password");
$db_selected = mysql_select_db("CollegeProject",$link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

?>