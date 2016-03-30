<?php
if(isset($userId) && $userId != "root")	{
	require("connect.php");
	/*$query = "UPDATE recTable SET phone='$phone', tablet='$tablet', laptop='$laptop' WHERE userId = '$userId'";
	$query = mysql_query($query);*/
	//boughtTable
	//for itemGroup = phone
	$result = mysql_query("SELECT * FROM boughtTable WHERE userId='".$userId."' AND itemGroup = 'phone'");
	$numResults = mysql_num_rows($result);
	$phoneRatings = $numResults*20;
	//for itemGroup = tablet
	$result = mysql_query("SELECT * FROM boughtTable WHERE userId='".$userId."' AND itemGroup = 'tablet'");
	$numResults = mysql_num_rows($result);
	$tabletRatings = $numResults*20;
	//for itemGroup = laptop
	$result = mysql_query("SELECT * FROM boughtTable WHERE userId='".$userId."' AND itemGroup = 'laptop'");
	$numResults = mysql_num_rows($result);
	$laptopRatings = $numResults*20;

	//visitedTable
	//for itemGroup = phone
	$result = mysql_query("SELECT * FROM visitedTable WHERE userId='".$userId."' AND itemGroup = 'phone'");
	$numResults = mysql_num_rows($result);
	$phoneRatings += $numResults;
	//for itemGroup = tablet
	$result = mysql_query("SELECT * FROM visitedTable WHERE userId='".$userId."' AND itemGroup = 'tablet'");
	$numResults = mysql_num_rows($result);
	$tabletRatings += $numResults;
	//for itemGroup = laptop
	$result = mysql_query("SELECT * FROM visitedTable WHERE userId='".$userId."' AND itemGroup = 'laptop'");
	$numResults = mysql_num_rows($result);
	$laptopRatings += $numResults;

	//ratedTable
	//for itemGroup = phone
	$result = mysql_query("SELECT * FROM ratedTable WHERE userId='".$userId."' AND itemGroup = 'phone'");
	while($row = mysql_fetch_array($result))	{
		$phoneRatings += $row['rating'];
	}

	//for itemGroup = tablet
	$result = mysql_query("SELECT * FROM ratedTable WHERE userId='".$userId."' AND itemGroup = 'tablet'");
	while($row = mysql_fetch_array($result))	{
		$tabletRatings += $row['rating'];
	}
	//for itemGroup = laptop
	$result = mysql_query("SELECT * FROM ratedTable WHERE userId='".$userId."' AND itemGroup = 'laptop'");
	while($row = mysql_fetch_array($result))	{
		$laptopRatings += $row['rating'];
	}

	mysql_query("UPDATE recTableUser SET phone = '$phoneRatings', tablet = '$tabletRatings', 
				laptop = '$laptopRatings' WHERE userId = '$userId' ");

	mysql_close();

	//echo $phoneRatings."<br>".$tabletRatings."<br>".$laptopRatings."<br>";
}