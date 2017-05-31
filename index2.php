<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<link href="include/style4.css" rel="stylesheet" type="text/css">
<link href="include/style5.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="greeting">
  <img id="intranetVinyl" src="img/intranetVinyl.jpg" alt="Vinyl Record On Player"/> 
        </div> 
 <header class="center">
    <nav class="mobile">
      <a href="mp_now.php"><img class="logo" src="img/m_and_p_intranet.png" alt="M & P Now"></a> 
    </nav>
  </header>

<div class="container">  
  
    <div class="login" id="mobile">
    
    <div id="signup">
      <h1>Welcome</h1><br/>
      <h4> Please sign in to view M&P Now!</h4>
    </div>
      <form action="" method= "post"> 
        <h4><label>Email:</label> <input type="text" name="username" id="username"/></h4>
        <h4><label>Password:</label> <input type="password" name="password" id="password"/></h4>
        
        <input type="submit" value="Sign In">
      </form>

      <h4> If you not know your login, please contact your administrator.</h4>

    </div>
     

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

      if (!$result || !filter_var($username, FILTER_VALIDATE_EMAIL))
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
              header("Location: mp_now.php");
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

<section class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
    <p class="footer_header">FOR THE LATEST NEWS &amp; UPDATES</p>
    <div class="button"><a href="https://www.facebook.com/MP-Records-1869719426386940/" target="new">subscribe</a></div>
  </section>
</div>
</body>
</html>