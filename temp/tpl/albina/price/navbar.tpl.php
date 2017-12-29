<?

$category = get_queried_object();

	$cat_list = get_terms(array(
		'taxonomy' => 'ourprice-categories',
		'hide_empty' => false,
		'order' => 'ASC',
		'orderby' => 'id',
		'parent' => 0,
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
						$link = get_term_link($cat->term_id, 'ourprice-categories');
						$title = $cat->name;
						$item_class = '';
						if($category->parent == $cat->term_id) {
							$item_class = $item_class . ' is--active ';
						}
				?>
				<li class="<?=$param["block_prefix"];?>item ">
					<a class="<?=$param["block_prefix"];?>link  <?=$param["link_prefix"];?>item <?=$item_class;?> " href="<?=$link;?>"><span><?=$title;?></span></a>
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