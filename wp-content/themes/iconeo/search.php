<?php
/**
 * The template for displaying Search Results pages
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
			</div>
			<!-- /Colonne de gauche -->
			
			<!-- Colonne de droite -->
			<div class="large-8 medium-7 columns">
				<div class="row">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div>
				<div class="row col-droite">
					
					
					<?php if ( have_posts() ) : ?>
		
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'iconeo' ), get_search_query() ); ?></h1>
		
					
					<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();
								if( $post->post_type != 'page' ) continue;
								/*
								 * Include the post format-specific template for the content. If you want to
								 * use this in a child theme, then include a file called called content-___.php
								 * (where ___ is the post format) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
		
							endwhile;
							// Previous/next post navigation.
							iconeo_paging_nav();
		
						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );
		
						endif;
					?>
				</div>
			</div>
			<!-- /Colonne de droite -->
			
		</div>
	</section>

<?php
get_footer();