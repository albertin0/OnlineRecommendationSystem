<html> 
  <head>
        <meta charset="utf-8">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <!--link rel="stylesheet" href="css_index/styleIndex.css" type="text/css" media="all" />-->
    </head>
    <body>
    <div id="wrapper">
		<!-- Header -->
		<div id="top">
			<!-- Shell -->
			<div class="shell">
				<div class="top-nav">
					<ul>
					    <li class="first nobg"><a href="./signup.php" title="Default welcome msg!">SignUp</a></li>
					    <?php
					    echo'<li><a href="./index.php" title="Logout">Go to Index</a></li>';
              	    	echo'<li><a href="./login.php" title="Login">Login</a></li>';
					    ?>
					    <!--<li><a href="#" title="My Account">My Account</a></li>
					    <li><a href="#" title="My Wishlist">My Wishlist</a></li>
					    <li class="nobg"><a href="#" class="bag" title="My Bag">My Bag</a></li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
    <?php 
      $form = 
      '<form action="./signup.php" method="post">
      
        <h1>Sign Up</h1>
        
          <legend>Give Your basic info</legend>
          
          <label for="name">UserId:</label>
          <input type="text" id="name" name="userId">

          <label for="name">Name:</label>
          <input type="text" id="name" name="name">

          <label for="mail">Email:</label>
          <input type="email" id="mail" name="email">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
          
          <label>Gender:</label>
          <input type="radio" id="under_13" value="male" name="gender">
          <label for="under_13" class="light">Male</label>&nbsp; &nbsp; &nbsp; &nbsp;

          <input type="radio" id="over_13" value="female" name="gender">
          <label for="over_13" class="light">Female</label>
        
        
        <input type="submit" name="registerbtn" value="Sign Up" >
      </form>';
      if(isset($_POST['registerbtn']))  {
        	$userId = $_POST['userId'];
        	$name = $_POST['name'];
	        $email = $_POST['email'];
    	    $password = $_POST['password'];
    	    $gender = $_POST['gender'];
        	require("connect.php");
	        //$password = md5(md5("asdasd".$password."asdasd"));
    	    mysql_query("INSERT INTO `users` 
       	                        VALUES ('$userId','$name','$email','$password','$gender')");
	        //$query = mysql_query("INSERT INTO users VALUES ('','$user','$email','$password'");
    	    $query = mysql_query("INSERT INTO `recTableUser` VALUES ('$userId',0,0,0)");
          	mysql_close();
          	if($query)	{  
            	//echo "$user    -    $password    & $email   inserted in Table";
           		header("Location: ./index.php");
            	die();
        	}
         	echo "$userId account was not Created";
         	echo '<a href="./signup.php"><h1>Please Try Again To SignUp</h1></a>';
      }
      else
        echo $form;
      ?>
      
    </body>
</html>