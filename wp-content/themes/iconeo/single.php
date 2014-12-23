<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


	<section class="contenu">		
		<div class="row">
		
			<!-- Colonne de gauche -->
			<div class="large-4 medium-5 columns">
				<div class="logo-left">
					<a href="<?php site_url(); ?>/iconeo/" title="Iconeo - Révélateur d'attraction"><img src="<?php bloginfo('template_directory'); ?>/img/logo-iconeo.png" alt="Iconeo - Révélateur d'attraction" title="Iconeo - Révélateur d'attraction" class="logo-page" /></a>
				</div>
				<div class="details-left">
					<h2 class="bleu">Actualités</h2>
					<?php
						global $post;
						$myposts = get_posts('numberposts=5&category=11&order=DESC');
						foreach($myposts as $post) :
					?>
						<a href="<?php the_permalink(); ?>">- <?php the_title(); ?></a><br/>
					<?php endforeach; ?>
				</div>
			</div>
			<!-- /Colonne de gauche -->
			
			<!-- Colonne de droite -->
			<div class="large-8 medium-7 columns">
				<div class="row">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div>
				<div class="row col-droite">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;
					?>
				</div>
			</div>
			<!-- /Colonne de droite -->
			
		</div>
	</section>

<?php
get_footer();
