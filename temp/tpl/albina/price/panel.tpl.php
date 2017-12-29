<?
$projects = new WP_Query(array(
	'post_type' => 'ourprice',
	'posts_per_page' => -1,	
	'post__in' => $param["block_id"]
));
?>
<div class="<?=$param["block_prefix"];?>block  <?=$param["bg_prefix"];?>block">	
	<div class="container <?=$param["block_prefix"];?>container <?=$param["bg_prefix"];?>container">	
		<div class="page-header__block  is--center  is--panel">
			<h3 class="page-header__heading  is--center  is--panel"><span>Cтоимость услуги</span></h3>		
		</div>
		<?
		while($projects->have_posts()) {
			$projects->the_post();
			$id = get_the_ID();
			//$link = l($id);
			//$title = t($id);
			$content = c($id);
		?>
		<div class="text__block  <?=$param["block_prefix"];?>text-block">
			<?=$content;?>
		</div>
		<?} wp_reset_postdata();?>
	</div>
	<?
		//фоновые картинки
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--tube-leaf  is--services",
				"block_bg" => "bg-tube-leaf.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--flover-syringes  is--services",
				"block_bg" => "bg-flover-syringes.png",
			)
		);
	?>
</div>