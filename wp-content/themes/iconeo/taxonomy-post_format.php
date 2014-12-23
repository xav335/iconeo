<?php
/**
 * The template for displaying Post Format pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
 *
 * @todo http://core.trac.wordpress.org/ticket/23257: Add plural versions of Post Format strings
 * and remove plurals below.
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
					<?php if ( have_posts() ) : ?>
						<h1 class="archive-title">
							<?php
								if ( is_tax( 'post_format', 'post-format-aside' ) ) :
									_e( 'Asides', 'iconeo' );
		
								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									_e( 'Images', 'iconeo' );
		
								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									_e( 'Videos', 'iconeo' );
		
								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									_e( 'Audio', 'iconeo' );
		
								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									_e( 'Quotes', 'iconeo' );
		
								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									_e( 'Links', 'iconeo' );
		
								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									_e( 'Galleries', 'iconeo' );
		
								else :
									_e( 'Archives', 'iconeo' );
		
								endif;
							?>
						</h1>
		
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