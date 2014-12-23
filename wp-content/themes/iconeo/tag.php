<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
					<h1>Erreur 404 : la page n'existe pas ou plus</h1>
					<?php if ( have_posts() ) : ?>
						<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'iconeo' ), single_tag_title( '', false ) ); ?></h1>
						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
						?>
					</header><!-- .archive-header -->
		
					<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();
		
								/*
								 * Include the post format-specific template for the content. If you want to
								 * use this in a child theme, then include a file called called content-___.php
								 * (where ___ is the post format) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
		
							endwhile;
							// Previous/next page navigation.
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