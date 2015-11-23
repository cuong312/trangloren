<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Life Line</title>



<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,700italic,900,700,500italic,500,400italic,300italic,300,100italic,100|Open+Sans:400,300,400italic,300italic,600,600italic,700italic,700,800|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>


<!-- Styles -->
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="css/newstyle.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="css/responsive.css" rel="stylesheet" type="text/css" /> -->
<!-- <link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/sea-green.css" title="sea-green" />
<link rel="alternate stylesheet" type="text/css" href="css/brown.css" title="brown" />
<link rel="alternate stylesheet" type="text/css" href="css/bright-red.css" title="bright-red" />
<link rel="alternate stylesheet" type="text/css" href="css/yellow.css" title="yellow" />
<link rel="alternate stylesheet" type="text/css" href="css/green.css" title="green" />
<link rel="alternate stylesheet" type="text/css" href="css/hunter-green.css" title="hunter-green" />
<link rel="alternate stylesheet" type="text/css" href="css/light-pink.css" title="light-pink" />
<link rel="alternate stylesheet" type="text/css" href="css/orange.css" title="orange" />
<link rel="alternate stylesheet" type="text/css" href="css/pink.css" title="pink" />
<link rel="alternate stylesheet" type="text/css" href="css/red.css" title="red" /> -->

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie.css" />
<script type="text/javascript" language="javascript" src="js/html5shiv.js"></script>
<![endif]-->


<!-- Scripts -->
<!-- <script src="js/jquery.1.9.1.js" type="text/javascript"></script>
<script src='js/testimonials.js'></script>
<script src='js/script.js'></script>
<script src='js/bootstrap.js'></script>
<script src="js/html5lightbox.js"></script>
<script src="js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>
<script src='js/styleswitcher.js'></script> -->
		
		
<!-- Scripts For Layer Slider  -->
<!-- <script src="layerslider/JQuery/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="layerslider/JQuery/jquery-transit-modified.js" type="text/javascript"></script>
<script src="layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script> -->

<!-- Document Ready Functions -->
<?php wp_head(); ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#layerslider').layerSlider({
			skinsPath : "<?php echo THEME_URL . '/'?>layerslider/skins/",
			skin : 'defaultskin',
			responsive: true,
			responsiveUnder: 1200,			
			pauseOnHover: false,
			showCircleTimer: false,
			navStartStop:false,
			navButtons:false,
		}); // LAYER SLIDER
		
	jQuery(function() {
		
		/*jQuery('#causes2').carouFredSel({
			auto: false,
			pagination: "#pager",
			items: {
				visible: 1,
			},
		}); // CAUSES CAROUSEL

		jQuery('#reviews').carouFredSel({
			auto: true,
			pagination: "#pager2",
			items: {
				visible: 1,
			},
		}); //FOOTER CAROUSEL


		jQuery('#carousel').carouFredSel({
			responsive: true,
			circular: false,
			auto: false,
			items: {
				visible: 1,
				width: 20,
				height: '40%'
			},
			scroll: {
				fx: 'directscroll'
			}
		});
		jQuery('#thumbs').carouFredSel({
			responsive: true,
			circular: false,
			infinite: false,
			auto: false,
			prev: '#prev',
			next: '#next',
			items: {
				visible: {
					min: 1,
					max: 6
				},
				width: 200,
				height: '80%'
			}
		});
		jQuery('#thumbs a').click(function() {
			jQuery('#carousel').trigger('slideTo', '#' + this.href.split('#').pop() );
			jQuery('#thumbs a').removeClass('selected');
			jQuery(this).addClass('selected');
			return false;
		});*/
		
	});
	
			
});		

</script>	
</head>
<body>
<div class="theme-layout">

<div id="top-bar" style="display:none;">
	<div class="container">
		<ul>
			<li>
				<i class="icon-home"></i>
				425 Street Name, UK, London
			</li>
			<li>
				<i class="icon-phone"></i>
				(123) 456-7890
			</li>
			<li>
				<i class="icon-envelope"></i>
				contact@companymail.com
			</li>
		</ul> 
		<div class="search-box">
			<input class="submit-button" type="submit" value="" >
			<input class="search-input" type="text" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';"  value="Search">
		</div>
	</div>
</div><!--top bar-->



<header class="sticky">
	<div class="container">
		<div class="logo">
			<a href="#" title=""><img src="<?php echo THEME_URL . '/'?>images/logo.png" alt="Logo" /><h1><i>T</i>rangLoren</h1></a>
		</div><!-- Logo -->
		<!-- <nav class="menu">
			<ul id="menu-navigation">
				<li class="active"><a href="index.html">TRANG CHỦ</a>
				</li>
				<li><a>GIỚI THIỆU</a>		
				</li>
				<li><a href="cources.html">KHÓA HỌC</a>
					<ul>
						<li><a>Workshop Pronunciation</a></li>
						<li><a>American Accent Training</a></li>
						<li><a>Listening and Speaking Part 1</a></li>
						<li><a>Listening and Speaking Part 2</a></li>						
					</ul>
				</li>
				<li><a href="teacher.html">GIẢNG VIÊN</a>
				</li>
				<li><a href="student.html">HỌC VIÊN</a>

				</li>
				<li><a href="blog.html">TIN TỨC</a>

				</li>
				<li><a href="elements.html">BÀI HỌC</a>
					<ul>
						<li><a>Phát âm</a></li>
						<li><a>Ngữ pháp</a></li>
					</ul>
				</li>
			</ul>   
		</nav>-->
		<?php cuongbui_menu('primary-menu'); ?> 
	</div>		
</header><!--header-->
	
