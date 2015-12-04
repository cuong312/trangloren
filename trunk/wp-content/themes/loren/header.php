<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,700italic,900,700,500italic,500,400italic,300italic,300,100italic,100|Open+Sans:400,300,400italic,300italic,600,600italic,700italic,700,800|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie.css" />
<script type="text/javascript" language="javascript" src="js/html5shiv.js"></script>
<![endif]-->

<?php wp_head(); ?>
	
</head>
<body>
<div class="theme-layout">

<header class="sticky">
	<div class="container">
		<div class="logo">
			<a href="<?php get_home_url(); ?>" title=""><img src="<?php apply_filters( 'cuongbui_logo', THEME_URL . '/images/logo.png' ); ?>" alt="Logo" /><h1><i>T</i>rangLoren</h1></a>
		</div><!-- Logo -->
		<?php cuongbui_menu('primary-menu'); ?> 
	</div>		
</header><!--header-->
	
