<!DOCTYPE html>
<html>
<head >
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title><?php wp_title( '–', true, 'right' ); ?></title>
<?php wp_head(); ?>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<script>
//<![CDATA[
var async = async || [];
(function () {
    var done = false;
    var script = document.createElement("script"),
    head = document.getElementsByTagName("head")[0] || document.documentElement;
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js';
    script.type = 'text/javascript'; 
    script.async = true;
    script.onload = script.onreadystatechange = function() {
        if (!done && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete")) {
            done = true;
            // Process async variable
            while(async.length) { // there is some syncing to be done
                var obj = async.shift();
                if (obj[0] =="ready") {
                    $(obj[1]);
                }else if (obj[0] =="load"){
                    $(window).load(obj[1]);
                }
            }
            async = {
                push: function(param){
                    if (param[0] =="ready") {
                        $(param[1]);
                    }else if (param[0] =="load"){
                        $(window).load(param[1]);
                    }
                }
            };
            // End of processing
            script.onload = script.onreadystatechange = null;
            if (head && script.parentNode) {
                head.removeChild(script);
            }
        }
    };
head.insertBefore(script, head.firstChild);
})();
//]]>
</script>
</head>
<body>
<header class="navbar-light bg-white fixed-top mediumnavigation nav-down" style="top: 0px;">
	<div class="container">
		<div class="row justify-content-center align-items-center brandrow">
			<div class="col-lg-4 col-md-4 hidden-xs-down customarea">

				<!-- FOLLOW  -->
				<a class="btn follow" href="#" target="blank"><i class="fa fa-user"></i> Follow</a>
				<a href="#" target="_blank">
				<i class="fa fa-facebook social"></i></a>
				<a href="#" target="_blank">
				<i class="fa fa-instagram social"></i></a>

			</div>
            <div class="col-lg-4 col-md-4 text-center logoarea">
				<a class="notranslate navbar-brand" href="<?php echo get_site_url(); ?>">
				<?php bloginfo('name'); ?>
				</a>
			</div>
           
	        <div class="col-lg-4 col-md-4 mr-auto text-right searcharea">
				<form action="<?php echo get_site_url(); ?>/" class="search-form" method="get" role="search">
					<input class="search-field" name="s" placeholder="Search..." title="Search for:" type="search">
					<button class="search-submit" type="submit">
					<i class="fa fa-search"></i>
					</button>
				</form>
			</div>
		</div>
		<div class="navarea">
			<nav class="navbar navbar-toggleable-sm">
				<button aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#bs4navbar" data-toggle="collapse" type="button">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="bs4navbar">
					<ul class="navbar-nav col-md-12 justify-content-center" id="menu-menu">

					<!-- NAV MENU -->

						<li class="menu-item nav-item"><span itemprop="name"><a class="nav-link" href="#" itemprop="url">Menu</a></span></li>
						<li class="menu-item nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#">Menu</a>
							<div class="dropdown-menu">
								<span itemprop="name"><a class="dropdown-item" href="#" itemprop="url">Sub Menu</a></span>
								<span itemprop="name"><a class="dropdown-item" href="#" itemprop="url">Sub Menu</a></span>
							</div>
						</li>
						<li class="menu-item nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#">Menu</a>
								<div class="dropdown-menu">
								<span itemprop="name"><a class="dropdown-item" href="#" itemprop="url">Sub Menu</a></span>
								<span itemprop="name"><a class="dropdown-item" href="#" itemprop="url">Sub Menu</a></span>
							</div>
						</li>
						<li class="menu-item nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#">Menu</a>
								<div class="dropdown-menu">
								<span itemprop="name"><a class="dropdown-item" href="#" itemprop="url">Sub Menu</a></span>
								<span itemprop="name"><a class="dropdown-item" href="#" itemprop="url">Sub Menu</a></span>
							</div>
						</li>
						<li class="menu-item nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#">Menu</a>
								<div class="dropdown-menu">
								<span itemprop="name"><a class="dropdown-item" href="#" itemprop="url">Sub Menu</a></span>
								<span itemprop="name"><a class="dropdown-item" href="#" itemprop="url">Sub Menu</a></span>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</header>
<?php $adsheader = get_option('adsheader'); if($adsheader) { echo '<div class="ads">'.$adsheader.'</div>'; } ?>