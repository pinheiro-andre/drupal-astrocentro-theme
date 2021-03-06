<?php 
	$detect = mobile_detect_get_object();
?>

<div id="wrap" class="clearfix">
	<div id="header-wrap">
		<header id="header" class="clearfix" role="banner">
		  	<div id="site-header-main" class="clearfix">
				<?php if( $detect->isMobile() || $detect->isTablet() ){ //if mobile or tablet ?>

						<?php print render($page['header_top']); //Search bar ?>
					
						<a id="responsive-menu-button" href="#responsive-menu-button"><i class="fa fa-bars fa-2x"></i> <span>Menu</span></a>
						<a href="/blog" title="Blog do <?php print $site_name; ?>" class="brand" rel="home">Blog <img src="<?php print base_path() . drupal_get_path('theme', 'astrocentro_br_v2') . '/images/m-logo-horizontal.png'; ?>" /> <?php //print $site_name; ?></a>
						<div class="right-side">
							<i class="fa fa-search fa-2x bt-search"></i>
						</div>
						<div class="sac"><a href="tel:+551139571012"><i class="fa fa-phone fa-lg"></i> (11) 3957-1012</a></div>

				<?php } else { // if desktop ?>

					<a href="/blog" title="Blog do <?php print $site_name; ?>" class="brand" rel="home">
						<span>Blog</span> 
						<img src="<?php print base_path() . drupal_get_path('theme', 'astrocentro_br_v2') . '/images/logo-horizontal.png'; ?>" />
						<?php //print $site_name; ?>
					</a>
					<div class="right-side">
						<a href="tel:+551139571012" class="sac"><i class="fa fa-phone fa-lg"></i> (11) 3957-1012</a>
						<?php print render($page['header_top']); //Search bar ?>
					</div>


				<?php } ?>
			</div>
			
			<nav id="navigation" role="navigation">
				<div id="main-menu">
					<?php 
						if (module_exists('i18n_menu')) {
							$main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
						} else {
							$main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
						}
						print drupal_render($main_menu_tree);
					?>
				</div>
			</nav>
		</header>


		<div class="clear"></div>
	</div>

	<div id="main-content" class="clearfix isfront">
		<article id="last-content">
			<h3>Últimos artigos</h3>
			<?php // display the 8 last posts / videos
				$block_recents_content = module_invoke('views','block_view','homepage_last_content-block');
				print render($block_recents_content);
			?>
		</article>
    	<div class="clear"></div>
  </div>

	<?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']  || $page['footer']): ?>
	<footer id="footer-bottom">
		<div id="footer-area" class="clearfix">
		  <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
			<div id="footer-block-wrap" class="clearfix">
			  <?php if($page['footer_first']): ?><div class="footer-block">
				<?php print render ($page['footer_first']); ?>
			  </div><?php endif; ?>
			  <?php if($page['footer_second']): ?><div class="footer-block">
				<?php print render ($page['footer_second']); ?>
			  </div><?php endif; ?>
			  <?php if($page['footer_third']): ?><div class="footer-block remove-margin">
				<?php print render ($page['footer_third']); ?>
			  </div><?php endif; ?>
			</div>
			<div class="clear"></div>
		  <?php endif; ?>
	  
		
		</div>
	</footer>
	<?php endif; ?>

	
	<footer id="footer-bottom">
			<div id="copyright">
				<h2>Consultas esotéricas 24 horas</h2> &copy; <?php print t('Copyright'); ?> <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a> <?php echo date("Y"); ?> - todos direitos reservados
			</div>

			<ul id="footer-categories" class="clearfix">
				<li><a href="/blog/tarot">Tarot</a></li>
				<li><a href="/blog/videncia">Vidência</a></li>
				<li><a href="/blog/astrologia">Astrologia</a></li>
				<li><a href="/blog/oraculos">Oráculos</a></li>
				<li><a href="/blog/numerologia">Numerologia</a></li>
				<li><a href="/blog/espiritual">Bem-estar</a></li>
			</ul>
			<div class="clear"></div>
			
	
<?php 
		$twitter_url = theme_get_setting('twitter_url', 'astrocentro_br_v2'); 
		$facebook_url = theme_get_setting('facebook_url', 'astrocentro_br_v2'); 
		$google_plus_url = theme_get_setting('google_plus_url', 'astrocentro_br_v2');
		$instagram_url = theme_get_setting('instagram_url', 'astrocentro_br_v2');
?>
			
			<ul id="footer-social" class="clearfix">
				<?php if ($facebook_url): ?>
					<li>
						<a class="color-facebook" target="_blank" title="<?php print $site_name; ?> Facebook" href="<?php print $facebook_url; ?>"><i class="fa fa-facebook-square fa-3x"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($twitter_url): ?>
					<li>
				  		<a class="color-twitter" target="_blank" title="<?php print $site_name; ?> Twitter" href="<?php print $twitter_url; ?>"><i class="fa fa-twitter-square fa-3x"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($google_plus_url): ?>
					<li>
				  		<a class="color-googleplus" target="_blank" title="<?php print $site_name; ?> Google+" href="<?php print $google_plus_url; ?>"><i class="fa fa-google-plus-square fa-3x"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($instagram_url): ?>
					<li>
				  		<a class="color-instagram" target="_blank" title="<?php print $site_name; ?> Instagram" href="<?php print $instagram_url; ?>"><i class="fa fa-instagram fa-3x"></i></a>
					</li>
				<?php endif; ?>

					<li>
				  		<a class="color-rss" target="_blank" title="<?php print $site_name; ?>RSS" href="<?php print $front_page; ?>rss.xml"><i class="fa fa-rss-square fa-3x"></i></a>
					</li>
			</ul>

<?php if ($page['footer']): ?>
			<?php print render($page['footer']); ?>
<?php endif; ?>
	</footer>
</div>