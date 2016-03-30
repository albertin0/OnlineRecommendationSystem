<?php
session_start();
  $userId = $_POST['userId'];
  $password = $_POST['password'];
  require("connect.php");
  //$sql_statement = "SELECT * FROM users";
  //$password = md5(md5("asdasd".$password."asdasd"));
  $query = mysql_query("SELECT * FROM users WHERE userId='".$userId."' AND password='".$password."'");
  //$query = mysql_query("INSERT INTO users VALUES ('','$user','$email','$password'");
  mysql_close();
  if($query)  {
            $numresults = mysql_num_rows($query);
            if($numresults == 0)  {
            //echo "$userId    Logged In";
            //else  {
              echo "$userId     -     $password    does not exist or invalid field.";
              echo "<h2>plz go back and <a href='./login.php'>try again.</a><h2>";
              session_destroy();
              exit();
            }
            //set session variables:
            $_SESSION['userId'] = $userId;
            if($userId == 'root') {
                header("Location: ./root.php");
                die();
            }
            require("recArray2Creation.php");
            header("Location: ./index.php");
            //echo "<a href = './index.php'>Click me!</a>";
            
  }
          else
            echo "error";

?>      