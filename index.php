<?php 
include "feeds.php"; 
include "urls.php"; 
include "weather.php"; 
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>negativenull.net</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="doc main" data-spy="scroll" data-target="#m-nav" data-offset="10">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<button class="m-nav-menu-btn m-btn m-large m-inverse"><i class="fa fa-bars"></i></button>
	<nav id="m-nav" role="navigation">
		<ul class="m-nav m-list m-doc-nav nav">
		<li>
			<a href="#intro"><i class="fa fa-home"></i></a>
		</li>
		<li>
			<a href="#search"><i class="fa fa-search"> Search</i></a>
		</li>
		<li>
			<a href="#weather"><i class="fa fa-cloud"> Weather</i></a>
		</li>
		<li>
			<a href="#rss"><i class="fa fa-rss"> RSS Feeds</i></a>
		</li>
		<li>
			<a href="#share"><i class="fa fa-cloud-download"> NextCloud</i></a>
		</li>
		</ul>
	</nav>

        <!-- Add your site or application content here -->
	<main class="m-container">
	<section id='intro'>
		<h1 class="m-sub">Negativenull.net</h1>
	</section>
	<section id='search'>
		<iframe src="https://duckduckgo.com/search.html?prefill=Search DuckDuckGo&kn=1&bgcolor=#2c3e50" style="overflow:hidden;margin:0;padding:0;width:408px;height:40px;max-width:100%;" frameborder="0"></iframe>
	</section>
	<section id='weather'>
		<iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="https://forecast.io/embed/#lat=<?php echo $lat;?>&lon=<?php echo $lon; ?>&name=<?php echo $city; ?>&color=#2c3e50&font=arial"></iframe>
	</section>
	<section id='rss'>
		<h2 class="m-sub">RSS</h2>
	<div class="display">
		<div class="m-row m-spaced m-gutters">
		<?php
		foreach($urls as $name=>$url) {
			displayFeed($name,$url);
		}
		?>
		</div>
	</div>
	</section>
	<section id="share">
	<h2 class="m-sub">NextCloud</h2>
		<p><button class="m-btn m-inverse" onClick='var win=window.open("https://cloud.negativenull.net", "_blank");win.focus();'>Cloud</button></p>
		<p><a target="_blank" rel="noreferrer" href="https://nextcloud.com/federation#nathan@cloud.negativenull.net" style="padding:10px;background-color:#004B74;color:#ffffff;border-radius:3px;padding-left:4px;"> <span style="background-image:url(https://cloud.negativenull.net/core/img/logo.svg?v=4);width:50px;height:30px;position:relative;top:8px;background-size:contain;display:inline-block;background-repeat:no-repeat; background-position: center center;"></span> Share with me via Nextcloud</a></p>
	</section>
	<section>
	<h5>&copy; <?php echo date("Y"); ?> negativenull.net</h5>
	</section>

	</main>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.min.js"></script>
<script>
var link = document.createElement('link');
link.type = 'image/x-icon';
link.rel = 'shortcut icon';
link.href = 'favicon.ico';
document.getElementsByTagName('head')[0].appendChild(link);
</script>
    </body>
</html>
