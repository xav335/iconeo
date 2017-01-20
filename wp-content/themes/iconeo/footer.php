<?php /* <!-- Begin WordPress Cache (DO NOT MODIFY) --> *//* <!-- End WordPress Cache --> */ ?><?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>



	<?php wp_footer(); ?>
<footer>
<div class="row">
	<section class="actualites large-6 medium-6 small-12">
		<h1>Actualités</h1>
						<?php echo do_shortcode( '[post-by-category category="11"]' ); ?>
	</section>
	 
	<section class="confiance medium-5 small-12">
		<h1>Ils nous ont fait confiance.</h1>
		<div class="slider autoplay">
		<div>
			<a href="http://www.micheltattoo.com" target="_blank">
			<img src="<?php bloginfo('template_directory'); ?>/img/ref-michel-tattoo.png" alt="Michel Tattoo" title="Michel Tattoo" /></a>
		</div>
		<div>
			<a href="http://www.speakerscornerlanguage.com" target="_blank">
			<img src="<?php bloginfo('template_directory'); ?>/img/ref-speaker-corner.png" alt="Michel Tattoo" title="speakerscorner" /></a>
		</div>
		<div>
			<a href="http://www.elevagelama.com" target="_blank">
			<img src="<?php bloginfo('template_directory'); ?>/img/lama.png" alt="Michel Tattoo" title="élevage lama" /></a>
		</div>
		<div>
			<a href="http://www.bsport.fr" target="_blank">
			<img src="<?php bloginfo('template_directory'); ?>/img/bsport.png" alt="bsport" title="bsport" /></a>
		</div>
		<div>
			<a href="http://www.efs-tahiti.com" target="_blank">
			<img src="<?php bloginfo('template_directory'); ?>/img/efs.png" alt="efs" title="efs" /></a>
		</div>
		</div>
	</section>
	<section class="large-4 medium-4 small-12">	
		<div class="gwd-div-aoh4" id="contsocnet">
		      <img src="<?php bloginfo('template_directory'); ?>/img/facebook.png" class="gwd-img-p0fd" id="facebook" data-gwd-style="" data-gwd-override-style="" style="">
		      <img src="<?php bloginfo('template_directory'); ?>/img/google.png" class="gwd-img-lvno" id="googgle">
		      <img src="<?php bloginfo('template_directory'); ?>/img/twiter.png" class="gwd-img-lfu2" id="twiter">
		      <img src="<?php bloginfo('template_directory'); ?>/img/viadeo.png" class="gwd-img-dhsh" id="viadeo">
		      <img src="<?php bloginfo('template_directory'); ?>/img/linkedin.png" class="gwd-img-446i" id="linkedin">
		      <gwd_animation_pause_element></gwd_animation_pause_element>
		      <div class="gwd-div-gqzm" id="thetext"></div>
		</div>
	</section>
	<hr />
	<section class="large-4 medium-4 small-12">
		<p class="menu-footer">
			<a href="<?php site_url(); ?>/iconeo/index.php?p=8" title="Iconeo">Iconeo</a><br />
			<a href="<?php site_url(); ?>/iconeo/index.php?p=468" title="Services">services</a>
			- <a href="<?php site_url(); ?>/iconeo/index.php?p=2" title="Formation">formation</a>
			- <a href="<?php site_url(); ?>/iconeo/index.php?p=371" title="Web &amp; PLv">web &amp; plv</a> 
			- <a href="<?php site_url(); ?>/iconeo/index.php?p=12" title="Consulting">consulting</a><br />
			<a href="<?php site_url(); ?>/iconeo/index.php?p=16" title="Références">références</a><br />
			<a href="<?php site_url(); ?>/iconeo/index.php?p=18" title="Contact">contact</a>
		</p>
	</section> 
	<section class="large-4 medium-4 small-12"> 
		<img src="<?php bloginfo('template_directory'); ?>/img/logo-footer.png" alt="Iconeo" title="Iconeo" /> 
	</section> 
	<section class="large-4 medium-4 small-12">
		<p class="coordonnees">
			<span class="bleu">contact@iconeo.fr</span><br />
				12 route de Bordeaux - 33360 Latresne
		</p>
	</section> 
	<span class="cleaner"></span>
</div>
</footer>

<!-- Scripts -->
<script type="text/javascript"
	src="<?php bloginfo('template_directory'); ?>/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript"
	src="<?php bloginfo('template_directory'); ?>/js/slick/slick.js"></script>
<script>
		$(document).ready(function(){
			/* Animation ouverture */
			$('.logo').fadeIn(1000).animate({'margin-top':'55px'},1000);
			$('.web-plv').delay(2000).fadeIn(1000);
			$('.formation').delay(3000).fadeIn(1000);
			$('.consulting').delay(4000).fadeIn(1000);
			$('.services').delay(5000).fadeIn(1000);
			$('.promo').delay(4000).fadeIn(1000);
			$('.menu-top').delay(500).animate({'opacity':'1'},1000);

		/*	$('.logo').fadeIn(10).animate({'margin-top':'55px'},1000);
			$('.web-plv').delay(20).fadeIn(1000);
			$('.formation').delay(30).fadeIn(1000);
			$('.consulting').delay(40).fadeIn(1000);
			$('.services').delay(50).fadeIn(1000);
			$('.promo').delay(60).fadeIn(1000);
			$('.menu-top').delay(70).animate({'opacity':'1'},1000); */
			
			/* Slider références */
			$('.autoplay').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 3000,
				pauseOnHover: true,
				speed:1000
			});
			
		});
	</script>
<!-- /Scripts -->

<!-- Scripts spécifiques -->
<script>
		$(document).ready(function(){
		<?php if ( is_page( '8' ) ): ?>
			$('.nav-menu li:nth-child(1)').addClass('active');
		<?php elseif ( is_page( '10' )  || is_page( '685' )  || is_page( '687' ) || is_page( '371' ) || is_page( '415' )  || is_page( '1076' )   || is_page( '166' ) || is_page( '169' ) || is_page( '171' )): //webplv?>
			$('.nav-menu li:nth-child(2)').addClass('active');
		<?php elseif ( is_page( '2' )  || is_page( '737' ) ): ?>
			$('.nav-menu li:nth-child(3)').addClass('active');
		<?php elseif ( is_page( '12' ) ): ?>
			$('.nav-menu li:nth-child(4)').addClass('active');
		<?php elseif ( is_page( '14' ) || is_page( '468' ) || is_page( '485' ) || is_page( '156' )): //services?>
			$('.nav-menu li:nth-child(5)').addClass('active');
		<?php elseif ( is_page( '16' ) ): ?>
			$('.nav-menu li:nth-child(6)').addClass('active');
		<?php elseif ( is_page( '18' ) ): ?>
			$('.nav-menu li:nth-child(7)').addClass('active');
		<?php endif; ?>
		});
	</script>
<!-- /Scripts spécifiques -->

<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-11864990-4', 'auto');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');
</script>
</body>
</html>
