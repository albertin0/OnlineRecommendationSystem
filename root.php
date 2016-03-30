<?php
session_start();
?>
<html> 
  <head>
        <meta charset="utf-8">
        <title>Upload An Item</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <?php 
      if(isset($_SESSION['rootmsg'])) {
        $msg = $_SESSION['rootmsg'];
        $form = "<h2>".$msg."</h2>";
        session_destroy();
      }
      else
        $form = null;
      $form .= 
      '<h2><a href="./destroy.php">LogOut</a></h2>
      <form action="./root.php" method="post" enctype="multipart/form-data">
      
        <h1>Upload An Item to Database</h1>
        
          <label for="name">ItemId:</label>
          <input type="text" id="name" name="itemId">

          <label>Item Group:</label>
          <input type="radio" id="under_13" value="phone" name="itemGroup">
          <label for="under_13" class="light">Phone</label>&nbsp; &nbsp; &nbsp; &nbsp;

          <input type="radio" id="over_13" value="tablet" name="itemGroup">
          <label for="over_13" class="light">Tablet</label>&nbsp; &nbsp; &nbsp; &nbsp;

          <input type="radio" id="over_13" value="laptop" name="itemGroup">
          <label for="over_13" class="light">Laptop</label>
          
          <label for="name">Item Name:</label>
          <input type="text" id="name" name="itemName">

          <label for="name">Item Pic:</label>
          <input type="file" id="name" name="itemPic">

          <label for="name">Item Price:</label>
          <input type="text" id="name" name="itemPrice">

          <label for="name">Item Description:</label>
          <input type="textbox" id="textboxid" name="itemDescription">
                 
        <input type="submit" name="uploadbtn" value="Upload" >
      </form>';
      if(isset($_POST['uploadbtn']))  {
        	$itemId = $_POST['itemId'];
        	$itemGroup = $_POST['itemGroup'];
	        $itemName = $_POST['itemName'];
          $timeStamp = time();
          $itemPic = $_FILES['itemPic']['name'];
          
          /*$itemPic = addslashes($_FILES['itemPic']['tmp_name']);
          $itemPic = file_get_contents($itemPic);
          $itemPic = base64_encode($itemPic);*/
    	    $itemDescription = $_POST['itemDescription'];
    	    $itemPrice = $_POST['itemPrice'];
        	require("connect.php");
	        //$password = md5(md5("asdasd".$password."asdasd"));
    	    $query1 = mysql_query("INSERT INTO `items` 
       	                        VALUES ('$itemId','$itemGroup','$itemName',
                                  '$timeStamp','$itemPic','$itemDescription','$itemPrice')");
	        //$query = mysql_query("INSERT INTO users VALUES ('','$user','$email','$password'");
          if($query1)
            mysql_query("INSERT INTO `recTableItem` VALUES ('$itemId','$itemGroup','','','','')");
          
          mysql_close();
          
          if($query1)	{  
            	//echo "$user    -    $password    & $email   inserted in Table";
           		header("Location: ./root.php");
              move_uploaded_file($_FILES['itemPic']['tmp_name'], './itemPic/'.$itemPic);
              $_SESSION['rootmsg'] = "Item $itemName uploaded successfully";
            	die();
        	}
         	echo "$itemName was not Inserted";
         	echo '<a href="./root.php"><h1>Please Try Again</h1></a>';
      }
      else
        echo $form;
      ?>
      
    </body>
</html>