<?php
  if(isset($userId) && $userId<>"root")   {
    require("connect.php");
    $query = mysql_query("SELECT * FROM recTableUser WHERE userId='".$userId."'");
    $query = mysql_fetch_array($query);
    //echo $query['phone'];
    $phoneR = $_SESSION['phone']  = $query['phone'];
    $tabletR = $_SESSION['tablet'] = $query['tablet'];
    $laptopR = $_SESSION['laptop'] = $query['laptop'];
    //$_SESSION['id'] = mysql_fetch_row($query)['id'];
    //sleep(15);

    $query = mysql_query("SELECT * FROM recTableUser WHERE userId<>'$userId'");
    $noOfRows=0;
    while($row = mysql_fetch_array($query)) {
      $array[$noOfRows][0] = $row['userId'];
      $phoneRU2 = $row['phone'];  $tabletRU2 = $row['tablet'];  $laptopRU2 = $row['laptop'];
      $array[$noOfRows][1] = floor(sqrt(pow($phoneRU2-$phoneR,2)+pow($tabletRU2-$tabletR,2)
                            +pow($laptopRU2-$laptopR,2)));
      $noOfRows++;
    }
    //userIds are sorted based on their distances with 
    for($i=0;$i<$noOfRows-1;$i++) {
      for($j=$i+1;$j<$noOfRows;$j++)  {
        if($array[$i][1]>$array[$j][1])  {
          $temp = $array[$i][1];
          $array[$i][1] = $array[$j][1];
          $array[$j][1] = $temp;
          $temp = $array[$i][0];
          $array[$i][0] = $array[$j][0];
          $array[$j][0] = $temp;
        }
      }
    }
    //for($i=0;$i<$noOfRows;$i++) {
    //  echo $array[$i][0]." has distance ".$array[$i][1]."<br>";
    //}
    for($i=0;$i<5;$i++) {
      $array2[$i][0] = $array[$i][0];
      $array2[$i][1] = $array[$i][1];
    }
    $_SESSION['array'] = $array2;
    mysql_close();
  }
?>