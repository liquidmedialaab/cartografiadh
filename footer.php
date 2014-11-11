<footer id="colophon">
	<div class="footer-container">
		<?php
		 wp_nav_menu( array(
			'theme_location' => 'footer_menu',
			'container' => 'nav',
			'container_id' => 'footer-menu'
		) ); 
		?>

		<div id="square-widget-footer" class="square-widget clearfix">
			<?php dynamic_sidebar('yellow-square-footer'); ?>
		</div>
		<div class="clearfix"></div>
	</div>

	<div id="footer-logos" class="clearfix">
		<div class="logos">
			<h5>apoio</h5>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/alesp.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/capes.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/ceha.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/cvesp.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/dcp.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/eca.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/ppgcp.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/tvalesp.png">
		</div>
		<div class="logos">
			<h5>parceiros</h5>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/ceuma.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/mpf.png">
		</div>
		<div class="logos">
			<h5>realização</h5>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/catedra.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/iea.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/prceu.png">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logos/usp.png">
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</div>
</body>
</html>