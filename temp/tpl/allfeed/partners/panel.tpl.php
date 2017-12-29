<?
	$__prefix = $param["block_prefix"];
	$content_mod = $param["block_mod"];

	$partners = $this->getItems(array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'orderby' => array(
			'menu_order' => 'ASC',
			'date' => 'DESC',
			'ID' => 'DESC',
			'name' => 'ASC',
		),
		'tax_query' => array(array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => array('partners'),
		)),
	));

?>
<div class="<?=$__prefix;?>row row  is--gutter  is--wrap  <?=$content_mod;?>">
	<?
	if(count($partners)) {
		foreach($partners as $p) {
			$id = $p->ID;
			$title = $p->post_title;
			$preview = $this->mdl('Imgs')->postImg($id, '232x96');
			$link = $this->Azbn->getMeta($id, 'website');
			if ($preview == ""){
				$preview = "http://via.placeholder.com/232x96";
			}						
	?>
	<div class="<?=$__prefix;?>cols cols  is--cols-screen-2  <?=$content_mod;?>">		
		<a href="<?=$link?>" class="<?=$__prefix;?>card  <?=$content_mod;?>" rel="nofollow" target="_blank">
			<img src="<?=$preview?>" alt="<?=$title;?>">
		</a> 
	</div>	
	<?
		}
	}
	?>
</div>