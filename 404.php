<?php
get_header('simple');
?>

<div class="not-found">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="not-found__title">
					<span>4</span>
					<img src="<?php bloginfo( 'template_directory' ); ?>/img/earth.png" alt="">
					<span>4</span>
				</div>
				<div class="not-found__subtitle">
					<?php pll_e("Упс... На этой странице ничего нет"); ?>
				</div>
				<div class="not-found__text">
					<?php pll_e("Вернитесь на главную страницу и узнайте о своей судьбе!"); ?>
				</div>
				<a href="<?php echo get_home_url(); ?>" class="btn btn--purpure">
					<span><?php pll_e("На главную"); ?></span>
				</a>
			</div>
		</div>
	</div>
</div>

<?php
get_footer('simple');
