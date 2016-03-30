<html> 
  <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
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
        <form action="./innitiate.php" method="post">
      
        <h1>Enter your Name and Password to Login</h1>
        
          <legend><span class="number">1</span>Enter your info</legend>
          <label for="name">Name:</label>
          <input type="text" id="name" name="userId">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
                          
        <input type="submit" name="loginbtn" value="Login" >
      </form>
      
    </body>
</html>