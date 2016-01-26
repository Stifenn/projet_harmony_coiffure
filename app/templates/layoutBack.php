<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Director | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
<!-- Style css -->
    <!-- bootstrap 3.0.2 -->
    <link href="<?= $this->assetUrl('css/css_theme/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?= $this->assetUrl('css/css_theme/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?= $this->assetUrl('css/css_theme/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?= $this->assetUrl('css/css_theme/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?= $this->assetUrl('css/css_theme/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?= $this->assetUrl('css/css_theme/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?= $this->assetUrl('css/css_theme/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?= $this->assetUrl('css/css_theme/iCheck/all.css') ?>" rel="stylesheet" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="<?= $this->assetUrl('css/css_theme/style.css') ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/styleBack.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('source/jquery.fancybox.css?v=2.1.5') ?>" type="text/css" media="screen" />




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

<!-- Javascript -->
	<!-- jQuery 2.0.2 -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    <!-- jQuery UI 1.10.3 -->
    <script src="<?= $this->assetUrl('js/js_theme/jquery-ui-1.10.3.min.js') ?>" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?= $this->assetUrl('js/js_theme/bootstrap.min.js') ?>" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?= $this->assetUrl('js/js_theme/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>

    <script src="<?= $this->assetUrl('js/js_theme/plugins/chart.js') ?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?= $this->assetUrl('js/js_theme/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
    <!-- calendar -->
    <script src="<?= $this->assetUrl('js/js_theme/plugins/fullcalendar/fullcalendar.js') ?>" type="text/javascript"></script>

    <!-- Director App -->
    <script src="<?= $this->assetUrl('js/js_theme/Director/app.js') ?>" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="<?= $this->assetUrl('js/js_theme/Director/dashboard.js') ?>" type="text/javascript"></script>
    
    <!-- fancybox -->
    
    <script type="text/javascript" src="<?= $this->assetUrl('lib/jquery.mousewheel-3.0.6.pack.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('source/jquery.fancybox.pack.js?v=2.1.5')?>"></script>

	<!-- JS scriptBack -->
    <script src="<?= $this->assetUrl('js/scriptBack.js') ?>" type="text/javascript" charset="utf-8" ></script>

</head> 
<body class="skin-black">       <!-- header logo: style can be found in header.less --> 
	<header class="header">
		<a href="<?= $this->url('home') ?>" class="logo">
		    Home
		</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>  
        </a>
 		<div class="navbar-right">
		    <ul class="nav navbar-nav">
		         <!-- User Account: style can be found in dropdown.less -->
		        <li class="dropdown user user-menu">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                <i class="fa fa-user"></i>
		                <span>Jane Doe <i class="caret"></i></span>
		            </a>
		            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
		                <li class="divider"></li>
	                    <li>
	                        <a href="#">
	                        	<i class="fa fa-user fa-fw pull-right"></i>
	                            Profile
	                        </a>
	                        <a data-toggle="modal" href="#modal-user-settings">
	                        	<i class="fa fa-cog fa-fw pull-right"></i>
	                            Settings
	                        </a>
	                    </li>
						 <li class="divider"></li>
	                    <li>
	                        <a href="#">
	                        	<i class="fa fa-ban fa-fw pull-right"></i> 
	                        	Logout
	                        </a>
	                    </li>
		            </ul>
	            </li>
	        </ul>
    	</div>
	</nav>
	</header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../assets/img/img_theme/26115.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>
                            <a href="#">
                           		<i class="fa fa-circle text-success"></i> 
                            	Online
                            </a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Images</span>
                            </a>
                            <ul id="nav">
								<li><a href="<?= $this->url('slider') ?>" title="">Image du Slider</a></li>
								<li><a href="<?= $this->url('lookbook') ?>" title="">photos du Lookbook</a></li>
								<li><a href="<?= $this->url('images') ?>" title="">Images de presentation du salon</a></li>
								<li><a href="<?= $this->url('produits') ?>" title="">Images des produits</a></li>
							</ul>

                        </li>
                        <li>
                            <a href="<?= $this->url('administration_tarifs') ?>">
                                <i class="fa fa-gavel"></i> <span>Tarifs</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->url('administration_commentaires') ?>">
                                <i class="fa fa-globe"></i> <span>Commentaires</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->url('manage') ?>">
                                <i class="fa fa-glass"></i> <span>Gestion des comptes</span>
                            </a>
                        </li>
                    </ul>
                </section>
                 <!-- /.sidebar -->
         	</aside>
          	<aside class="right-side">

           		<!-- Main content -->
	            <section class="content">
	               	<h2><?= $this->e($title) ?></h1>
	             	<?= $this->section('main_content') ?>

	                    <!-- Main row -->

	            </section>
               	<div class="footer-main">
                <a href="<?= $this->url('home') ?>">Accueil</a>
                    Copyright &copy Director, 2014
                </div>
            </aside> <!-- /.right-side -->

        </div><!-- ./wrapper -->


        

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>