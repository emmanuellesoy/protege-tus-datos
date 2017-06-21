<!DOCTYPE html>

<!--[if IE 8 ]><html class="ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?php get_locale(); ?>"> <!--<![endif]-->

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
  <meta name="description" content="<?php _e( get_bloginfo('description'), 'dataTaker' ); ?>">
  <meta name="author" content="shannonbit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">

  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Favicons - place favicon.ico and apple-touch-icon.png in the root directory
  ================================================== -->
  <!-- <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"> -->
  <!-- <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon.png"> -->

  <meta property="og:url"           content="<?php echo home_url(); ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?php bloginfo( 'name' ); ?>" />
  <meta property="og:description"   content="<?php bloginfo( 'description' ); ?>" />
  <meta property="og:image"         content="<?php echo get_stylesheet_directory_uri(); ?>/images/intro-bg.jpg" />

  <?php wp_head(); ?>
</head>
<body>

  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=504110026430930";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!-- Preload
  ================================================== -->
  <div id="preload-wrapper"><div id="preload"></div></div>
