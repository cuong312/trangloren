<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,700italic,900,700,500italic,500,400italic,300italic,300,100italic,100|Open+Sans:400,300,400italic,300italic,600,600italic,700italic,700,800|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
	
</head>
<body>
<div class="theme-layout">

<header class="sticky">
	<div class="container-fluid">
		<div class="logo">
			<a href="<?php echo get_site_url(); ?>" title=""><img src="<?php apply_filters( 'cuongbui_logo', THEME_URL . '/images/logo.png' ); ?>" alt="Logo" /><h1><i>T</i>rangLoren</h1></a>
		</div><!-- Logo -->
		<?php cuongbui_menu('primary-menu'); ?> 
		<!-- <nav class="navbar navbar-default">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Link1 <span class="sr-only">(current)</span></a></li>
		        <li><a href="#">Link2</a></li>
		        <li><a href="#">Link3</a></li>
		        <li><a href="#">Link4</a></li>
		      </ul>
		    </div> 	
		</nav> -->
	</div>		
</header><!--header-->
	
