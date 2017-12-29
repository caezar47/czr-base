<?

$cat_active = 0;

if($param['cat_id']) {
	$cat_active = $param['cat_id'];
}

$cat_list = get_terms(array(
	'taxonomy' => 'pricelist-categories',
	'hide_empty' => false,
	//'parent' => 133,
	//'child_of' => 0,
));

if(count($cat_list)) {

?>
		
		<div class="pricelist-navbar__dropdown">
			<div class="pricelist-navbar__dropdown-inner">
				<ul class="pricelist-navbar__nav">
					
					<?
					foreach($cat_list as $cat) {
						$link = get_term_link($cat->term_id, 'pricelist-categories');
					?>
					<li class="pricelist-navbar__item <?if($cat->term_id == $cat_active){?>is--active<?}?> ">
						<a class="pricelist-navbar__link" href="<?=$link;?>"><?=$cat->name;?></a>
					</li>
					<?
					}
					?>
					
				</ul>
			</div>
		</div>
		
<?

}