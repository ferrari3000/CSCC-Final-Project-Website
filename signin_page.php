<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign-In</title>
<link href="include/signup_page.css" rel="stylesheet" type="text/css">
</head>
<body>


<section class="hero" id="hero">
    <div> <a href="index.php"> <img id="logo" src="img/m_and_p_logo.png" alt="M & P Logo"></a> <img id="slogan" src="img/m_and_p_slogan.png" alt="M & P Slogan"> </div>
  </section>


<div class="container">
 <header> <a href="">
    <h4 class="logo"></h4>
    </a>
    <nav>
      <ul>
      </ul>
    </nav>
  </header>
	
    <div class="login" id="mobile">
    
    <div id="signup">
    	<h1>Sign In</h1><br/>
      <h4> Please sign in to view and purchase records</h4>
    </div>
      <form action="" method= "post"> 
        <h4><label>Username:</label> <input type="text" name="username" id="username"/></h4>
        <h4><label>Password:</label> <input type="password" name="password" id="password"/></h4>
        
        <input type="submit" value="Sign In">
      </form>
    </div>
    <div id="NewUser"><h4><a href="signup_page.php">New User</a></h4></div> 

<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    include('include/connect.php');

    $username = $_POST['username'];
    $pass = $_POST['password'];
    try {
      if (empty($username) ||
        empty($pass))
        throw new Exception('Enter all
          fields.');      
      
      $query = "SELECT * FROM users
        WHERE user_name = '$username'";
      $result = $con->query($query);

      if (!$result)
        throw new Exception("Login failed. Please try again.");

      $row = $result->fetch_assoc();
      $id = $row['user_id'];
      $hash = $row['pass'];
      $username = $row['user_name'];
      
      // check password
      if (password_verify($pass, $hash)) {
        session_destroy();
              session_start();
              $_SESSION['id'] = $id;
              $_SESSION['username'] = $username;
              header("Location: get-records.php");
            }
            else {
              throw new Exception("Login failed. Please try again.");
            }
    }
    catch (Exception $ex) {
      echo '<div class="error">' . $ex->getMessage() . '</div>';
    }
  }
?>
</div>
</body>
<div id = "footer"><a href="FAQ.php">FAQ</a>&nbsp;&nbsp;&nbsp;<a href="feedback.php">Feedback</a></div>
<!-- Footer Section -->
<?php include 'footer.html' ?>

</html>