<div class="navigation">
	<div class="toggle">
		<a class="toggleMenu" href="#"><?php esc_html_e('Menu','tatoo-lite'); ?></a>
	</div><!-- toggle -->
	<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">
		<?php 
			wp_nav_menu( 
				array( 
					'theme_location' => 'primary',
					'link_before' => '<span>',
					'link_after' => '</span>',
				)
			);
		?>
	</nav>
</div><!-- aligner -->