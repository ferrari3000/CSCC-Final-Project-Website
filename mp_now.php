<?php
  include('include/connect.php');

session_start();

if (!isset($_SESSION['id'])){
    session_destroy();
    header('Location: index2.php');
}
$username = $_SESSION['username'];
?>

<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>M&P Now!</title>
<link rel="stylesheet" href="include/style4.css" />
<link href="include/style5.css" rel="stylesheet" type="text/css">
<style type="text/css">
#top-menu {	display: none;
}
#top-menu {	display: block;
	float: right;
	background: rgba(255,255,255,1.00);
	border: 1px solid #3AF;
	padding: 7px 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-left: 10px;
	margin-bottom: 10px;
	height: 20px;
	z-index: 1000;
}
</style>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--<[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<div class="greeting">
            <span>Welcome To M&P Now!: <?=$username[0]?></span>
           <br/> <a href="logout2.php">Log Out</a>
           <br/> <a href="new-employee.php">New Employee (Admin Only)</a>
        </div> 
<body>
 
  <!-- Navigation -->
  <header class="center">
    <nav class="mobile">
    	<a href="mp_now.php"/><img class="logo" src="img/m_and_p_intranet.png" alt="M & P Now"> 
    </nav>
  </header>
 
 <!-- Carousel -->
 
<link href="include/carousel.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 90%;
      margin: auto;
  }
  </style>
<div id="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
      	<a href="http://recyclenation.com/2014/06/recycle-vinyl-records" target="new"><img src="img/records_recycle.jpg" alt="Records On Floor"/></a>
      </div>

      <div class="item">
        <a href="https://www.theguardian.com/music/2017/jan/03/record-sales-vinyl-hits-25-year-high-and-outstrips-streaming" target="new"><img src="img/recordSales.jpg" alt="Record Store"></a>
      </div>
    
      <div class="item">
        <a href="http://www.vinylrecordfair.com/clean-vinyl-records/" target="new"><img src="img/carbonFibre.jpg" alt="Carbon Fiber Brush"></a>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!--End Carousel-->
<div id="signup"> 
 <form>
	<h2>Quick Links:</h2>
	 <fieldset> 	
	 	<ul>
	 		<li><a href="include/associate_conduct.pdf" target="_blank">Associate Conduct</a></li><br/>
	 		<li><a href="include/attendance_policy.pdf" target="_blank">Attendance Policy</a></li><br/>
	 		<li><a href="include/dress_code1.pdf" target="_blank">Dress Code</a></li><br/>
	 		<li><a href="include/how_to_clock_in.pdf" target="_blank">How to Clock In and Out</a></li><br/>
	 		<li><a href="include/lost_or_stolen.pdf" target="_blank">Lost Or Stolen Policy</a></li><br/>
	 		<li><a href="include/money_back.pdf" target="_blank">Money Back Guarantee</a></li><br/>
	 		<li><a href="include/record_appraisal_policy.pdf" target="_blank">Record Appraisal Policy</a></li><br/>
	 		<li><a href="include/mp_training_intranet.pdf" target="_blank">Intranet Training</a></li><br/>
	 		<li><a href="include/mp_training_AppDetail_2017.04.15.pdf" target="_blank">Application Training</a></li><br/>
	 		<li><a href="include/" target="_blank">Accounting Program Training</a></li><br/>

	 	</ul>	
	 </fieldset>
</form>
<div id="signup">

</div>
	<img id="stock" src="img/stock_intranet.jpeg" alt="Record Store">
</div>
<section class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
    <p class="footer_header">FOR THE LATEST NEWS &amp; UPDATES</p>
    <div class="button"><a href="https://www.facebook.com/MP-Records-1869719426386940/" target="new">subscribe</a></div>
  </section>
</body>
</div>
</html>