<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign-Up</title>
<link href="include/signup_page.css" rel="stylesheet" type="text/css">
<?php include('process-validation.php'); ?>
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
	
    <div class="login">
    
    <p id="signup">
    	<h1>Sign-Up</h1>
     </p>
    
      <form action="" method="post"> 
        <h4><label>Username:</label> <input type="text" name="username" id="username" onblur="validateName('username')"/>
        <span id="usernameError" style="display: none;">Only letters please.</span></h4>
        <h4><label>Password:</label> <input type="password" name="password" id="password"></h4>
        <h4><label>Confirm:</label> <input type="password" name="confirm" id="password"></h4>
        
        <input type="submit" value="Submit">
      </form>
    </div>
    <div id="NewUser"><h4><a href="signin_page.php">Sign In</a></h4></div> 
 

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('include/connect.php');

    $username = $_POST['username'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];
    try {
      if (empty($username) ||
        empty($pass) ||
        empty($confirm))
        throw new Exception('Enter all
          fields.');
      if ($pass != $confirm)
        throw new Exception('Passwords must match.');


      $result = $con->query(
        "SELECT * FROM users 
        WHERE User_Name = '$username'");

      if ($result->num_rows > 0) {
        throw new Exception('Username already taken. Please choose another one.');
      }
            
      // encrypt password
      $pass = $con->real_escape_string(
        password_hash($pass, PASSWORD_BCRYPT));
      
      // insert into db
      $query = "INSERT INTO users(
        user_name, pass, join_date)
        VALUES ('$username', '$pass',
          now())";
      if ($con->query($query)) {
        echo '<div class ="confirm">User created successfully. Click the Sign In link to begin!</div>';
      }
      else {
        echo 'Problem saving to database: ' . $con->error;
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