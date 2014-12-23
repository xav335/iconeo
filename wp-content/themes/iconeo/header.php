<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	
	<meta name="keywords" content="iconeo, informatique, bordeaux, rive droite, agence web, creation de site internet, plv, plv dynamique, digital signage, formation informatique, formation,services informatiques, services informatiques aux tpe, service informatique aux pmeplv dynamique, digital signage, conseil en informatique, maintenance informatique, dolibarr, logiciel de gestion,crm, erp">
	<!-- Open Graph -->
	<meta property="og:title" content="Iconeo - Révélateur d'attraction" />
	<meta property="og:description" content="Iconeo - Révélateur d'attraction" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://www.iconeo.fr/" />
	<meta property="og:image" content="http://www.iconeo.fr/img/iconeo.gif" />
	<meta property="og:image:type" content="image/gif" />
	<meta property="og:image:width" content="300" />
	<meta property="og:image:height" content="300" />
	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="Iconeo - Révélateur d'attraction" />
	<meta name="twitter:description" content="Iconeo - Révélateur d'attraction" />
	<meta name="twitter:creator" content="@iconeo" />
	<meta name="twitter:image:src" content="http://www.iconeo.fr/img/iconeo.gif" />
	<meta name="twitter:domain" content="http://www.iconeo.fr/" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<!-- <meta id="viewport" name='viewport' /> -->
	<script>
	    (function(doc) {
	        var viewport = document.getElementById('viewport');
	        if ( navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i)) {
	            doc.getElementById("viewport").setAttribute("content", "width=device-width;initial-scale=1;");
	        } else if ( navigator.userAgent.match(/iPad/i) ) {
	            doc.getElementById("viewport").setAttribute("content", "width=device-width;initial-scale=0.85;");
	        }
	    }(document));
	</script>
	
	<meta name="apple-mobile-web-app-title" content="Iconeo" />
	<meta name="application-name" content="Iconeo" />
	
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/iconeo-icon.png" />
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/slick/slick.css"/>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	
	<!--[if lt IE 9]>;
	  <script>
	    document.createElement("header");
	    document.createElement("footer");
	    document.createElement("section");
	    document.createElement("aside");
	    document.createElement("nav");
	    document.createElement("article");
	    document.createElement("hgroup");
	    document.createElement("time");
	  </script>
	  <noscript>
	    <strong>Attention !</strong>
	    Comme votre navigateur ne prend pas en charge HTML5, certains éléments sont simulés à l'aide de JScript.
	    Malheureusement votre navigateur a désactivé les scripts. Veuillez l'activer pour afficher cette page.
	  </noscript>
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/gwd-iconeo-phone.css"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/gwd-iconeo-diaporama.css"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/gwd-social-networks.css"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/gwd-iconeo-encards.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <script type="text/javascript" gwd-events="support" src="<?php echo get_template_directory_uri(); ?>/js/gwd-events-support.1.0.js"></script>
    <script type="text/javascript" gwd-events="handlers" src="<?php echo get_template_directory_uri(); ?>/js/gwd-iconeo-handlers.js"></script>
    <script type="text/javascript" gwd-events="registration" src="<?php echo get_template_directory_uri(); ?>/js/gwd-iconeo-registration.js"></script>
</head>

<body <?php body_class(); ?>>
