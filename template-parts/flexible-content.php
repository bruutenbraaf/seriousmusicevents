<?php if ( have_rows( 'content' ) ): ?>
	<?php while ( have_rows( 'content' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'slider' ) : ?>
			<div class="carousel">
				<?php if ( have_rows( 'slide' ) ) : ?>
					<?php while ( have_rows( 'slide' ) ) : the_row(); ?>
					<?php $achtergrond = get_sub_field( 'achtergrond' ); ?>
					<div class="slide" <?php if ( $achtergrond ) { ?>style="background-image:url(<?php echo $achtergrond['url']; ?>);"<?php } ?>>	
						<div class="container">
							<div class="row">
								<div class="col-md-7">
									<h3><?php the_sub_field( 'subtitel' ); ?></h3>
									<h2><?php the_sub_field( 'titel' ); ?></h2>
								</div>
							</div>
						</div>
					</div>
			</div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
			<script>
				jQuery(document).ready(function () {
					jQuery('.carousel').slick({
					  infinite: true,
					  fade: true,
					  dots: false,
					  arrows: false
					});
				});
			</script>
		<?php elseif ( get_row_layout() == 'diensten' ) : ?>
			<?php if ( get_sub_field( 'toon_diensten' ) == 1 ) : ?>
				<section id="diensten-home">
					<div class="container">
						<div class="row diensten-home">
							<div class="col-md-12">
								<h2 class="title-home"><?php the_sub_field( 'titel' ); ?></h2>
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
							<div class="col-md-4 dienst">
								<h3 class="dienst-title"><?php the_title(); ?></h3> 
								
								<?php $dienst_afbeelding = get_field( 'project_afbeelding' ); ?>
								<?php if ( $dienst_afbeelding ) { ?>
									<img src="<?php echo $dienst_afbeelding['url']; ?>" alt="<?php echo $dienst_afbeelding['alt']; ?>" />
								<?php } ?>
								
								<p><?php echo excerpt(12); ?></p>
								
								<a href="<?php echo get_permalink();?>" class="small-btn"> Lees meer </a>
								
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
							<?php
								else :
									esc_html_e( 'Geen projecten gevonden', 'text-domain' );
								endif;
							?>				
						<?php else: ?>
						<?php endif; ?>
					</div>
				</section>
				<?php elseif ( get_row_layout() == 'projecten' ) : ?>
					<?php if ( get_sub_field( 'toon_diensten' ) == 1 ) : ?>
						<section id="projecten-slide">
							<div class="container">
								<div class="row">
								<div class="col-md-1">
									<div id="projecten-slider-arrows" class="arrows">
									</div>
								</div>
								<div class="col-md-11">
								<div class="projecten-slider">
									 	<?php
											$args = array(
												'post_type'   => 'projecten',										  
												'post_status' => 'publish',		
												'posts_per_page' => 9
												);									 
											$projecten = new WP_Query( $args );
											if( $projecten->have_posts() ) :
										?>
										<?php
											while( $projecten->have_posts() ) :
											$projecten->the_post();
										?>
											<div class="project-item">
												<h3><?php the_title(); ?></h3> 
												<span class="project-date"><?php $post_date = get_the_date( 'd-m-j' ); echo $post_date; ?></span>
												
												<?php $project_afbeelding = get_field( 'project_afbeelding' ); ?>
												<?php if ( $project_afbeelding ) { ?>
													<img src="<?php echo $project_afbeelding['url']; ?>" alt="<?php echo $project_afbeelding['alt']; ?>" />
												<?php } ?>
												
												<p><?php echo excerpt(26); ?></p>
												
												<a href="<?php echo get_permalink();?>" class="ghost-btn">Lees alles </a>						
											</div>
										<?php endwhile; wp_reset_postdata(); ?>
										<?php
											else :
												esc_html_e( 'Geen projecten gevonden', 'text-domain' );
											endif;
										?>		
									</section>
									<script>
										$(document).ready(function () {
											$('.projecten-slider').slick({
											  infinite: true,
											  slidesToShow: 3,
											  slidesToScroll: 1,
											  appendArrows: $('#projecten-slider-arrows'),
											});
										});
									</script>
								<?php else: ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
		<?php elseif ( get_row_layout() == 'over_ons_homepagina' ) : ?>
			<section id="homepagina-about">
				<?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
					<div class="over-ons-afbeelding" <?php if ( $afbeelding ) { ?>style="background-image:url(<?php echo $afbeelding['url']; ?>);"<?php } ?>>
					</div>
				<?php if ( have_rows( 'over_ons_tekst' ) ) : ?>
				<div class="about-content">
					<div class="container">
						<div class="row">
							<?php while ( have_rows( 'over_ons_tekst' ) ) : the_row(); ?>
								<div class="col-md-6">
								<h2><?php the_sub_field( 'titel' ); ?></h2>
								<p><?php the_sub_field( 'tekst' ); ?></p>
								<?php $knop = get_sub_field( 'knop' ); ?>
								<?php if ( $knop ) { ?>
									<a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
								<?php } ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( have_rows( 'hulp_tekst' ) ) : ?>
					<div class="hulp">
						<?php while ( have_rows( 'hulp_tekst' ) ) : the_row(); ?>
							<div class="inner-content">
								<h2><?php the_sub_field( 'titel' ); ?></h2>
								<p><?php the_sub_field( 'tekst' ); ?></p>
								<?php if ( have_rows( 'knoppen' ) ) : ?>
									<?php while ( have_rows( 'knoppen' ) ) : the_row(); ?>
										<?php $knop = get_sub_field( 'knop' ); ?>
										<?php if ( $knop ) { ?>
											<a class="<?php if ( get_sub_field( 'secondaire_knop' ) == 1 ) : ?>about-btn-secondair<?php else:?>about-btn<?php endif;?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
										<?php } ?>
						
						<?php endwhile; ?>
						</div>
							<?php else : ?>
								<?php // no rows found ?>
							<?php endif; ?>
							<div class="person">
								<div class="contact-persoon">
									<span class="person-name"><?php the_sub_field( 'naam' ); ?></span>
									<span class="function"><?php the_sub_field( 'functie' ); ?></span>
								</div>
								<div class="profielfoto">
									<?php $profielfoto = get_sub_field( 'profielfoto' ); ?>									
										<div class="profiel-foto" <?php if ( $profielfoto ) { ?>style="background-image:url(<?php echo $profielfoto['url']; ?>);"<?php } ?>>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				</div>
			</section>
		<?php elseif ( get_row_layout() == 'coltwaalf' ) : ?>
		<?php $achtergrond_afbeelding = get_sub_field( 'achtergrond_afbeelding' ); ?>
		<section <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>class="own"<?php } else { ?><?php } ?> <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>style="<?php if( get_sub_field('tekst_kleur') ): ?>color:<?php the_sub_field( 'tekst_kleur' ); ?>;<?php endif; ?> <?php if ( have_rows( 'padding' ) ) : ?><?php while ( have_rows( 'padding' ) ) : the_row(); ?>padding-top:<?php the_sub_field( 'boven' ); ?>;padding-right:<?php the_sub_field( 'rechts' ); ?>; padding-bottom:<?php the_sub_field( 'onder' ); ?>; padding-left:<?php the_sub_field( 'links' ); ?>;<?php endwhile; ?><?php endif; ?> <?php if( get_sub_field('achtergrond_kleur') ): ?>background:<?php the_sub_field('achtergrond_kleur'); ?>;<?php endif; ?> <?php if ( $achtergrond_afbeelding ) { ?>background-image:url(<?php echo $achtergrond_afbeelding['url']; ?>);<?php } ?>";<?php } else { ?><?php } ?>>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php the_sub_field( 'volledig' ); ?>
					</div>
				</div>
			</div>
		</section>
		<?php elseif ( get_row_layout() == 'colsix' ) : ?>
		<?php $achtergrond_afbeelding = get_sub_field( 'achtergrond_afbeelding' ); ?>
		<section <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>class="own"<?php } else { ?><?php } ?> <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>style="<?php if( get_sub_field('tekst_kleur') ): ?>color:<?php the_sub_field( 'tekst_kleur' ); ?>;<?php endif; ?> <?php if ( have_rows( 'padding' ) ) : ?><?php while ( have_rows( 'padding' ) ) : the_row(); ?>padding-top:<?php the_sub_field( 'boven' ); ?>;padding-right:<?php the_sub_field( 'rechts' ); ?>; padding-bottom:<?php the_sub_field( 'onder' ); ?>; padding-left:<?php the_sub_field( 'links' ); ?>;<?php endwhile; ?><?php endif; ?> <?php if( get_sub_field('achtergrond_kleur') ): ?>background:<?php the_sub_field('achtergrond_kleur'); ?>;<?php endif; ?> <?php if ( $achtergrond_afbeelding ) { ?>background-image:url(<?php echo $achtergrond_afbeelding['url']; ?>);<?php } ?>";<?php } else { ?><?php } ?>>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php the_sub_field( 'links' ); ?>
					</div>
					<div class="col-md-6">
						<?php the_sub_field( 'rechts' ); ?>
					</div>
				</div>
			</div>
		</section>
		<?php elseif ( get_row_layout() == 'paginaintro' ) : ?>
		<?php $achtergrond_afbeelding = get_sub_field( 'achtergrond_afbeelding' ); ?>
		<section <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>class="own"<?php } else { ?><?php } ?> <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>style="<?php if( get_sub_field('tekst_kleur') ): ?>color:<?php the_sub_field( 'tekst_kleur' ); ?>;<?php endif; ?> <?php if ( have_rows( 'padding' ) ) : ?><?php while ( have_rows( 'padding' ) ) : the_row(); ?>padding-top:<?php the_sub_field( 'boven' ); ?>;padding-right:<?php the_sub_field( 'rechts' ); ?>; padding-bottom:<?php the_sub_field( 'onder' ); ?>; padding-left:<?php the_sub_field( 'links' ); ?>;<?php endwhile; ?><?php endif; ?> <?php if( get_sub_field('achtergrond_kleur') ): ?>background:<?php the_sub_field('achtergrond_kleur'); ?>;<?php endif; ?> <?php if ( $achtergrond_afbeelding ) { ?>background-image:url(<?php echo $achtergrond_afbeelding['url']; ?>);<?php } ?>";<?php } else { ?><?php } ?>>	
				
			<div class="container">
				<div class="row">
					<div class="col-md-8 marginauto">
						<?php the_sub_field( 'tekst' ); ?>
					</div>
				</div>
			</section>
		<?php elseif ( get_row_layout() == 'colfour' ) : ?>
		<?php $achtergrond_afbeelding = get_sub_field( 'achtergrond_afbeelding' ); ?>
		<section <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>class="own"<?php } else { ?><?php } ?> <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>style="<?php if( get_sub_field('tekst_kleur') ): ?>color:<?php the_sub_field( 'tekst_kleur' ); ?>;<?php endif; ?> <?php if ( have_rows( 'padding' ) ) : ?><?php while ( have_rows( 'padding' ) ) : the_row(); ?>padding-top:<?php the_sub_field( 'boven' ); ?>;padding-right:<?php the_sub_field( 'rechts' ); ?>; padding-bottom:<?php the_sub_field( 'onder' ); ?>; padding-left:<?php the_sub_field( 'links' ); ?>;<?php endwhile; ?><?php endif; ?> <?php if( get_sub_field('achtergrond_kleur') ): ?>background:<?php the_sub_field('achtergrond_kleur'); ?>;<?php endif; ?> <?php if ( $achtergrond_afbeelding ) { ?>background-image:url(<?php echo $achtergrond_afbeelding['url']; ?>);<?php } ?>";<?php } else { ?><?php } ?>>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<?php the_sub_field( 'links' ); ?>
					</div>
					<div class="col-md-4">
						<?php the_sub_field( 'midden' ); ?>
					</div>
					<div class="col-md-4">
						<?php the_sub_field( 'rechts' ); ?>
					</div>
				</div>
			</div>
		</section>
		<?php elseif ( get_row_layout() == 'coldrie' ) : ?>
		<?php $achtergrond_afbeelding = get_sub_field( 'achtergrond_afbeelding' ); ?>
		<section <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>class="own"<?php } else { ?><?php } ?> <?php if ( get_sub_field( 'eigen_style_toevoegen' ) == 1 ) { ?>style="<?php if( get_sub_field('tekst_kleur') ): ?>color:<?php the_sub_field( 'tekst_kleur' ); ?>;<?php endif; ?> <?php if ( have_rows( 'padding' ) ) : ?><?php while ( have_rows( 'padding' ) ) : the_row(); ?>padding-top:<?php the_sub_field( 'boven' ); ?>;padding-right:<?php the_sub_field( 'rechts' ); ?>; padding-bottom:<?php the_sub_field( 'onder' ); ?>; padding-left:<?php the_sub_field( 'links' ); ?>;<?php endwhile; ?><?php endif; ?> <?php if( get_sub_field('achtergrond_kleur') ): ?>background:<?php the_sub_field('achtergrond_kleur'); ?>;<?php endif; ?> <?php if ( $achtergrond_afbeelding ) { ?>background-image:url(<?php echo $achtergrond_afbeelding['url']; ?>);<?php } ?>";<?php } else { ?><?php } ?>>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<?php the_sub_field( 'eerste' ); ?>
					<div class="col-md-3">
						<?php the_sub_field( 'tweede' ); ?>
					</div>
					<div class="col-md-3">
						<?php the_sub_field( 'derde' ); ?>
					</div>
					<div class="col-md-3">
						<?php the_sub_field( 'laatste' ); ?>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>