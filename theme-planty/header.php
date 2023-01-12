<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<header class='header'>

       		<div>
				<a href="<?php echo home_url( '/' ); ?>">          
            		<img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>" alt="Logo" class='logo'>    
        		</a>				
			</div> 

			<div class='pos-right'>
				<?php wp_nav_menu( 
				[
					'menu' => 'menu-entete',
					'container'=> '',
					'items_wrap'=>'<ul class="ul-menu">%3$s</ul>',
					'menu_class' => 'ul-menu'					
				]); 
				?>
			</div>

			
    	</header>


