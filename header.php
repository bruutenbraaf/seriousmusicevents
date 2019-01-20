<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Convident">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <title><?php wp_title(''); ?></title>

	<?php wp_head(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

</head>

<body <?php body_class(); ?>>
	
	<nav>
		<div class="container">
			<div class="row">
				<div class="col-md-4">					
					<?php if ( have_rows( 'button', 'option' ) ) : ?>
						<?php while ( have_rows( 'button', 'option' ) ) : the_row(); ?>
							<?php $link = get_sub_field( 'link' ); ?>
							<?php if ( $link ) { ?>
								<a class="btn" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
							<?php } ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="col-md-4 branding">
					
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.88865 31.6607C-0.078084 28.6074 7.62552 3.43392 8.56335 0.584095C8.69732 0.109124 9.16624 -0.0944343 9.63515 0.0412716C10.1041 0.176977 10.305 0.651948 10.1711 1.12692C6.95564 11.3049 3.33829 28.2681 7.55853 30.1001C7.75949 30.168 7.89347 30.168 7.89347 30.1001C9.23322 29.2859 9.76913 23.247 10.238 18.2937C10.9749 10.3549 11.6448 3.50177 15.0612 3.50177C15.5971 3.50177 15.999 3.70533 16.2669 4.04459C17.4727 5.3338 17.2718 8.86215 16.9368 14.4939C16.6689 19.0401 16.3339 24.604 17.4727 25.8932C17.7407 26.1646 17.9416 26.0968 18.1426 25.9611C19.0134 25.0111 18.7455 20.8043 18.4775 17.4795C18.1426 13.0012 17.8077 9.06571 19.2814 7.50509C19.6833 7.03012 20.2192 6.82656 20.8221 6.82656C21.559 6.82656 22.2289 7.09798 22.6978 7.6408C24.1715 9.20142 24.0375 12.6619 23.9705 15.7153C23.9036 17.0724 23.8366 18.8365 24.0375 19.4472C25.3773 19.1758 26.1811 16.6652 26.3151 15.7153C26.3821 15.2403 26.851 14.9689 27.3199 15.0368C27.7889 15.1046 28.0568 15.5796 27.9898 16.0546C27.9228 16.2581 27.052 21.2114 23.8366 21.2114C23.5016 21.2114 23.1667 21.0757 22.8987 20.8043C22.1619 20.0579 22.1619 18.5651 22.2958 15.7153C22.3628 13.2726 22.4968 9.9478 21.492 8.93001C21.291 8.72645 21.0901 8.65859 20.8221 8.65859C20.6881 8.65859 20.5542 8.72645 20.4872 8.7943C19.5493 9.81209 19.8843 14.019 20.1522 17.4116C20.4872 21.8221 20.7551 25.6897 19.4154 27.1824C18.6115 28.0645 17.1378 28.0645 16.2669 27.1824C14.7262 25.4861 14.8602 21.0757 15.2621 14.4939C15.4631 11.1013 15.798 5.87662 14.9942 5.3338C13.1185 5.3338 12.3817 13.3404 11.8457 18.633C11.1759 25.9611 10.64 30.5751 8.63033 31.7286C8.36238 31.8643 8.02744 32 7.62552 32C7.55853 31.8643 7.22359 31.7964 6.88865 31.6607Z" fill="white"/>
					</svg>
				</div>
				<div class="col-md-4">
					<div class="hamburger">
						<div class="toggle">
							<div></div>
							<div></div>
							<div></div>
						</div>
						<span class="nav-menu">Menu</span>
					</div>
				</div>
			</div>
		</div>
	</nav>
	
	<div class="main_nav">
		<div class="container">
			<div class="row">
				<div class="col-md-8 centred">
					<span class="nav-title">Navigatie</span>
					<?php wp_nav_menu( array( 'theme_location' => 'hoofd_menu' ) ); ?>				
					<?php if ( have_rows( 'button', 'option' ) ) : ?>
						<?php while ( have_rows( 'button', 'option' ) ) : the_row(); ?>
							<?php $link = get_sub_field( 'link' ); ?>
							<?php if ( $link ) { ?>
								<a class="btn" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
							<?php } ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if ( have_rows( 'algemene_gegevens', 'option' ) ) : ?>
						<?php while ( have_rows( 'algemene_gegevens', 'option' ) ) : the_row(); ?>
							<span class="telefoonnummer"><a href="<?php the_sub_field( 'telefoonnummer' ); ?>"><?php the_sub_field( 'telefoonnummer' ); ?></a></span>
							<span class="emailadres"><a href="<?php the_sub_field( 'emailadres' ); ?>"><?php the_sub_field( 'emailadres' ); ?></a></span>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="left_main_nav">
		<div class="container">
			<div class="row">
				<div class="col-md-8 centred">
					<div class="project-nav">
						<span class="titel-menu">Laatste projecten</span>
							<?php
								$args = array(
									'post_type'   => 'projecten',										  
									'post_status' => 'publish',		
									'posts_per_page' => 1
									);									 
								$projecten = new WP_Query( $args );
								if( $projecten->have_posts() ) :
							?>
							<?php
								while( $projecten->have_posts() ) :
								$projecten->the_post();
							?>
							
								<h3><?php the_title(); ?></h3> 
								<span class="project-date"><?php $post_date = get_the_date( 'd-m-j' ); echo $post_date; ?></span>
								
								<?php $project_afbeelding = get_field( 'project_afbeelding' ); ?>
								<?php if ( $project_afbeelding ) { ?>
									<img src="<?php echo $project_afbeelding['url']; ?>" alt="<?php echo $project_afbeelding['alt']; ?>" />
								<?php } ?>
								
								<p><?php echo excerpt(16); ?></p>
								
								<a href="<?php echo get_permalink();?>" class="ghost-btn">Lees alles </a>
								
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
							<?php
								else :
									esc_html_e( 'Geen projecten gevonden', 'text-domain' );
								endif;
							?>		
				</div>
			</div>
		</div>
	</div>
	<div class="fixed">
	</div>