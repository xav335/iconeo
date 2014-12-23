<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
//print_r(get_post_custom_values('article'));
get_header(); ?>

	<section class="contenu">		
		<div class="row">
		
			<!-- Colonne de gauche -->
			<div class="large-4 medium-5 small-12 columns">
				<div class="logo-left">
					<a href="<?php site_url(); ?>/" title="Iconeo - Révélateur d'attraction"><img src="<?php bloginfo('template_directory'); ?>/img/logo-iconeo.png" alt="Iconeo - Révélateur d'attraction" title="Iconeo - Révélateur d'attraction" class="logo-page" /></a>
				</div>
				
				<?php $values = get_post_custom_values('article');?>
				<?php if (isset($values[0])) { ?>
					<?php $my_query = new WP_Query('category_name='.$values[0]); ?>
					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php endwhile; ?>
				<?php } ?>	
			</div>
			<!-- /Colonne de gauche -->
			
			<!-- Colonne de droite -->
			<div class="large-8 medium-7 small-12 columns">
				<div class="row">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div>
				<div class="row col-droite">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();
		
							// Include the page content template.
							get_template_part( 'content', 'page' );
		
						endwhile;
					?>
				</div>
			</div>
			
			<!-- /Colonne de droite -->
			
		</div>
	</section>
	<section>
		<div class="row">

			<?php $values = get_post_custom_values('articlebas');?>
			<?php if (isset($values[0])) { ?>
				<?php $my_query = new WP_Query('category_name='.$values[0]);
				//print_r('category_name='.$values[0]);
				?>
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php the_content(); ?>
					<?php //get_template_part( 'content', 'page' ); ?>
				<?php endwhile; ?>
			<?php } ?>
		</div>
		<div class="separateur">
			<img src="<?php bloginfo('template_directory'); ?>/img/puce-bleue.png" alt="" />
			<img src="<?php bloginfo('template_directory'); ?>/img/puce-fuschia.png" alt="" />
			<img src="<?php bloginfo('template_directory'); ?>/img/puce-jaune.png" alt="" />
			<img src="<?php bloginfo('template_directory'); ?>/img/puce-verte.png" alt="" />
		</div>
	</section>
<?php
get_footer();
