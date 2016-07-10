<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>In Touch Recipes : Share your favourite recipes</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('favicon.ico');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/clean-blog.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap3-wysihtml5');?>" />

<!-- Custom Fonts -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
	<div class="container-fluid">
	    <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="<?php echo site_url('');?>"></i>In ToUcH ReCiPeS</a>
        </div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo site_url('');?>"></i>Home</a></li>
					<li><a href="<?php echo site_url('Blog/allArticle');?>">View all Recipes</a></li>
					<li><a href="<?php echo site_url('Blog/allRecipesCategory');?>">View Recipes by Categories</a></li>
					<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
						<li><a href="<?php echo site_url('Blog/addArticle');?>">Add Recipe</a></li>
						<li><a href="<?php echo site_url('Blog/addCategory');?>">Add Category</a></li>
						<li><a href="<?php echo site_url('Blog/allCategory');?>">Edit Categories</a></li>
						<li><a href="<?= site_url('logout') ?>">Logout</a></li>
					<?php else : ?>
						<li><a href="<?= site_url('register') ?>">Register</a></li>
						<li><a href="<?= site_url('login') ?>">Login</a></li>
					<?php endif; ?>
				</ul>
		</div>
	</div>
</nav>
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Recipes</h1>
                        <hr class="small">
                        <span class="subheading">In Touch Recipes is a way to share your favourite recipes</span>
                    </div>
                </div>
            </div>
        </div>
    </header>