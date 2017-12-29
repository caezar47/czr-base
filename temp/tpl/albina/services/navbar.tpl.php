<?
	$cat_list = get_terms(array(
		'taxonomy' => 'ourservice-categories',
		'hide_empty' => false,
		'parent' => 34,
		//'child_of' => 0,
	));
	if(count($cat_list)) {
?>
<div class="<?=$param["block_prefix"];?>block dropdown">
	<a href="#" data-toggle="dropdown" class="<?=$param["block_prefix"];?>btn-block">
		<div class="container">
			<div class="<?=$param["block_prefix"];?>btn">
				<div class="<?=$param["block_prefix"];?>btn-hamb">
					<div class="<?=$param["block_prefix"];?>btn-hamb-item  is--top"></div>
					<div class="<?=$param["block_prefix"];?>btn-hamb-item  is--center"></div>
					<div class="<?=$param["block_prefix"];?>btn-hamb-item  is--bottom"></div>
				</div>
				<div class="<?=$param["block_prefix"];?>btn-name">
					Другие разделы
				</div>
			</div>		
		</div>		
	</a>
	<div class="<?=$param["block_prefix"];?>dropdown">
		<div class="<?=$param["block_prefix"];?>dropdown-inner">
			<ul class="<?=$param["block_prefix"];?>nav">
				<?
					foreach($cat_list as $cat) {
						$link = get_term_link($cat->term_id, 'ourteam-categories');
						$title = $cat->name;
						$item_class = '';
				?>
				<li class="<?=$param["block_prefix"];?>item">
					<a class="<?=$param["block_prefix"];?>link  <?=$param["link_prefix"];?>item" href="<?=$link;?>"><span><?=$title;?></span></a>
				</li>
				<?	
					}
				?>
			</ul>
		</div>
	</div>
</div>
<?	
	}
?>	