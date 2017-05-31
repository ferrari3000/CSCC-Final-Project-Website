<!doctype html>
<link rel="stylesheet" href="include/style.css" />
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Feedback</title>
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

<h1 class = "confirm"> Feedback  </h1>
<div id="about">

<h3> Please Let Us Know How We Can Improve Our Site, or Our Store! </h3>

<script>
function checkTextField() {
    if (document.getElementById('email').value=="" || document.getElementById('feedback').value=="" ) {
        alert("Field is empty");
        return false;
    } else{
      alert("Thank You For Your Feedback! A Representative Will Respond To You Shortly!")
      return true;
    }
}  
</script>

<label> Your email </label><input type="text" name="email" id="email"/> <br/><br/>
<label> Feedback </label><textarea rows="4" cols="50" name="feedback" id="feedback"></textarea>
<br/><br/>
<form method="post" action="">
<input type ="submit" name="submit" value="Send"  onclick="return checkTextField();">
</form>
</div>

</div>
</body>

<div id = "footer"><a href="FAQ.php">FAQ</a>&nbsp;&nbsp;&nbsp;<a href="feedback.php">Feedback</a></div>
<!-- Footer Section -->
<?php include 'footer.html' ?>
<!-- Main Container Ends -->
</html>