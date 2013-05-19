
<?php
	//include db settings from .ini file
	$db = parse_ini_file("config/db.ini");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bystroff Lab Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/datePicker.css" rel="stylesheet">
	<link href="assets/css/edit-dialog.css" rel="stylesheet">
	
	<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster (this is a lie at the moment)-->
    <script src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/date.js"></script>
    <script src="assets/js/jquery.datePicker.js"></script>
	<script src="assets/js/jquery.simplemodal.1.4.4.min.js"></script>
	<script src="assets/js/bystroff_db.js"></script>

    <style>
		body {
			padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		}

		a.dp-choose-date {
			float: left;
			width: 16px;
			height: 16px;
			padding: 0;
			margin: 5px 3px 0;
			text-indent: -2000px;
			overflow: hidden;
			background: url(assets/img/calendar.png) no-repeat; 
		}
		a.dp-choose-date.dp-disabled {
			background-position: 0 -20px;
			cursor: default;
		}
		/* makes the input field shorter once the date picker code
		* has run (to allow space for the calendar icon
		*/
		input.dp-applied {
			width: 140px;
			float: left;
		}
	  
		  /* Start by setting display:none to make this hidden.
	   Then we position it in relation to the viewport window
	   with position:fixed. Width, height, top and left speak
	   speak for themselves. Background we set to 80% white with
	   our animation centered, and no-repeating */
		.loading-modal {
			display:    none;
			position:   fixed;
			z-index:    10000;
			top:        0;
			left:       0;
			height:     100%;
			width:      100%;
			background: rgba( 255, 255, 255, .8 ) 
						url('assets/img/FhHRx.gif') 
						50% 50% 
						no-repeat;
		}

		/* When the body has the loading class, we turn
		   the scrollbar off with overflow:hidden */
		body.loading {
			overflow: hidden;   
		}

		/* Anytime the body has the loading class, our
		   modal element will be visible */
		body.loading .loading-modal {
			display: block;
		}
    </style>
    <!--link href="assets/css/bootstrap-responsive.css" rel="stylesheet"-->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href=".">Bystroff Lab Database</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="new_sample.php">New Sample</a></li>
              <li><a href="locations_main.php">Edit Locations</a></li>
            </ul>
          </div><!--/.nav-collapse -->

          <div class="nav-collapse pull-right">
            <form class="navbar-search">
              <input type="text" class="search-query" placeholder="Quick Search" />
            </form>
            <ul class="nav">
              <li><a href="advanced_search.php">Advanced Search</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>