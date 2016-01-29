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
    <!-- Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="<?= $this->assetUrl('css/css_theme/style.css') ?>" rel="stylesheet" type="text/css" />
    <!-- style du back -->
    <link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/styleBack.css') ?>">
    <!-- fancybox -->
	<link rel="stylesheet" href="<?= $this->assetUrl('source/jquery.fancybox.css?v=2.1.5') ?>" type="text/css" media="screen" />
    <!-- Javascript -->
	<!-- jQuery 2.0.2 -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="<?= $this->assetUrl('js/js_theme/jquery-ui-1.10.3.min.js') ?>" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?= $this->assetUrl('js/js_theme/bootstrap.min.js') ?>" type="text/javascript"></script>
    <!-- Director App -->
    <script src="<?= $this->assetUrl('js/js_theme/Director/app.js') ?>" type="text/javascript"></script>
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
		                <span><?= $_SESSION['user']['prenom'] ?> <?= $_SESSION['user']['nom'] ?><i class="caret"></i></span>
		            </a>
		            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
		                <li class="divider"></li>
	                    <li>
	                        <a href="<?= $this->url('profil') ?>">
	                        	<i class="fa fa-user fa-fw pull-right"></i>
	                            Profile
	                        </a>
	                    </li>
						 <li class="divider"></li>
	                    <li>
	                        <a href="<?= $this->url('logoff') ?>">
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
                        <div class="pull-left info">
                            <p>Hello, <?= $_SESSION['user']['prenom'] ?></p>
                            <a href="#">
                           		<i class="fa fa-circle text-success"></i> 
                            	Online
                            </a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="<?= $this->url('recherche') ?>" method="post" class="sidebar-form">
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
                                <i class="fa fa-picture-o"></i> <span>Images</span>
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
                                <i class="fa fa-eur"></i> <span>Tarifs</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->url('administration_commentaires') ?>">
                                <i class="fa fa-comment"></i> <span>Commentaires</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->url('manage') ?>">
                                <i class="fa fa-users"></i> <span>Gestion des comptes</span>
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
                    Copyright &copy Santaniello, Duché, Gaschen, 2016
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

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>