<?php
get_header(); ?>

<?php $header_afbeelding = get_field( 'header_afbeelding' ); ?>

<?php if ( $header_afbeelding ) { ?>
	<div class="dienst-header" style="background-image:url('<?php echo $header_afbeelding['url']; ?>');">
		<a href="<?php echo get_archive_link('diensten'); ?>"><div class="back-btn"></div></a>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				</div>
				<div class="col-md-4">
					<div class="aanvragen">						
						<div class="close-aanvragen">
							<div></div>
							<div></div>
						</div>					
						<h2><?php the_field( 'titel_aanvragen', 'option' ); ?></h2>						
						<?php $formidable = get_field( 'formidable_shortcode', 'option' ); ?>
						<?php echo do_shortcode($formidable); ?>
					</div>
				</div>
				<h1 class="title">
					<?php echo the_title();?>
				</h1>
			</div>
		</div>
	</div>
<?php } ?>

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 marginauto">
	<?php echo the_content();?>
			</div>
		</div>
	</div>
</section>
<section id="andere-diensten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="title">Andere diensten</h2>
			</div>
			<?php
				$args = array(
					'post_type'   => 'diensten',										  
					'post_status' => 'publish',		
					'posts_per_page' => 6
					);									 
				$diensten = new WP_Query( $args );
				if( $diensten->have_posts() ) :
			?>
			<?php
				while( $diensten->have_posts() ) :
				$diensten->the_post();
			?>
			
					<div class="col-md-4 anderedienst">
						<h3 class="dienst-title"><?php echo the_title();?></h3>
						<p><?php echo excerpt(12); ?></p>
						<a href="<?php echo get_permalink();?>" class="small-btn"> Lees meer </a>
					</div>
				
				<?php endwhile; ?>	
				<?php else: ?>
			<?php endif; ?>
		</div>
	</div>
</section>




<?php get_footer(); ?>