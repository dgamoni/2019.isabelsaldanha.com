<div class="posts__list">
	<div class="container">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<?php if( has_post_thumbnail() ) { ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?> data-thumb_="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>">
			<?php } else { ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
			<?php } ?>

				<?php if( 'yes' == get_theme_mod( 'show_post_archive_date', 'yes' ) ) { ?>
					<div class="date"><?php the_time( get_option( 'date_format' ) ); ?></div>
				<?php } ?>
				<h3 class="post__title">
					<a href="<?php the_permalink(); ?>"><?php the_title( '<span class="title">', '</span>' ); ?></a>
				</h3>
				<?php if( 'yes' == get_theme_mod( 'show_post_archive_excerpt', 'yes' ) ) { ?>
					<div class="row">
						<div class="hide-overflow column col-8 offset-2 clearfix">
							<p><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></p>
							<?php the_excerpt(); ?>
							<div class="gap-10"></div>
						</div>
					</div>
				<?php } ?>
				<?php if( 'yes' == get_theme_mod( 'show_post_archive_readmore', 'yes' ) ) { ?>
					<a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('Read More', 'omio') ?></a>
				<?php } ?>
								
			</article>
	
		<?php
			endwhile;	
			else : 
				
				get_template_part( 'loop/content', 'none' );
				
			endif;
		?>

	</div>

	<?php echo function_exists( 'tommusrhodus_pagination' ) ? tommusrhodus_pagination() : posts_nav_link(); ?>

	<div class="posts__thumbs"></div>
</div>
