<?php 
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
	return;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Boiler Data</title>
<link rel="stylesheet" type="text/css" href="/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/plugins/boiler/css/main.css" />
<link rel="stylesheet" type="text/css" href="/plugins/font-awesome-4.0.3/css/font-awesome.min.css" />
<script type="text/javascript" src="/plugins/jquery/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="/plugins/boiler/widget/search_expression/search_expression.css" />
<link rel="stylesheet" type="text/css" href="/plugins/boiler/css/maxi-modal.css" />
<link rel="stylesheet" type="text/css" href="/plugins/jquery-ui/jquery-ui.css" />
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Boiler Data</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="status-widget">
					<a class="status-saved" href=""><i class="fa fa-check-square-o"></i> Saved</a>
					<a class="status-saving hidden" href=""><i class="fa fa-spinner fa-spin"></i> Saving</a>
					<a class="status-error hidden" href=""><i class="fa fa-exclamation-circle"></i> Saving Failed</a>
				</li>
				<li><a href="http://www.github.com/ivebeenlinuxed/boiler">Fork Me</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container" id="main-container">
