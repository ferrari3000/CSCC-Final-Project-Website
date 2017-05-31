<?php
  include('include/connect.php');

session_start();

$_SESSION['total'] = $total;
if (!isset($_SESSION['id'])){
    session_destroy();
    header('Location: signin_page.php');
}

?>


<!doctype html>
<link rel="stylesheet" href="include/style.css" />
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Records</title>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Container -->
  <!-- Logo Section -->
  <section class="hero" id="hero">
    <div> <a href="index.php"> <img id="logo" src="img/m_and_p_logo.png" alt="M & P Logo"></a> <img id="slogan" src="img/m_and_p_slogan.png" alt="M & P Slogan"> </div>
  </section>

<div class="container">
  <!-- Navigation -->
  <header> <a href="">
    <h4 class="logo"></h4>
    </a>
    <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="aboutUs.php">ABOUT US</a></li>
        <li><a href="get-records.php">RECORDS</a></li>
        <li> <a href="contact.php">CONTACT</a></li>
      </ul>
    </nav>
  </header>
<div class="greeting">
            <span>Logged in as: <?=$_SESSION['username']?></span>
            <a href="cart.php">My Cart</a>
            <a href="logout.php">Log Out</a>
        </div>

<h2 class = "confirm"> Thank You For Shopping With M&P Records. Your Order Will Arive in 5 to 10 days. </h2>

</div>
<div class="confirm">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($responseText)) echo $responseText; ?>
</div>
</div>
</body>

<div id = "footer"><a href="FAQ.php">FAQ</a>&nbsp;&nbsp;&nbsp;<a href="feedback.php">Feedback</a></div>
<!-- Footer Section -->
<?php include 'footer.html' ?>
<!-- Main Container Ends -->
</html>