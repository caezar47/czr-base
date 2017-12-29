<?

	$__prefix="content-block__";
	$__mod="is--full";
	$content_mod="is--news";
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";

	$content = c($this->post['id']);

	$posts = $this->getItems(array(
		'post_type' => 'post',
		'posts_per_page' => -1,//10,
		'orderby' => array(
			'menu_order' => 'ASC',
			'date' => 'DESC',
			'ID' => 'DESC',
			'name' => 'ASC',
		),

		'tax_query' => array(array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => array('news'),
		)),

	));
?>

<main class="<?=$__prefix;?>panel  <?=$__mod;?>"  role="main">
	<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
		<div class="<?=$__prefix;?>elem">
			<div class="<?=$heading_prefix;?>panel  <?=$heading_mod;?>">
				<?
				// хлебные крошки первого уровня
				$this->tpl(
					'_/bread', 
					array(
						"block_prefix" => "breadcrumb__",
						"block_mod" => "is--center"
					)
				);
				// заголовок страницы		
				$this->tpl(
					'_/heading', 
					array(
						"block_prefix" => "page-header__",
						"block_mod" => "is--page-heading  is--center"
					)
				);
				?>
			</div>
			<div class="<?=$__prefix;?>row row  is--wrap  is--gutter  <?=$content_mod;?>">
				<?
				if(count($posts)) {
					foreach($posts as $p) {	
						$id = $p->ID;					
						$link = l($id);
						$title = $p->post_title;
						$note = get_field('note', $id);
						$preview = $this->mdl('Imgs')->postImg($id, '493x340');
						$date_iso = get_the_date('Y-m-d', $p);
						$date = get_the_date('d F Y', $p);  //28 июля						
						if ($preview == ""){
							$preview = "http://via.placeholder.com/493x340";
						}						
				?>
				<div class="<?=$__prefix;?>cols cols  is--cols-4  <?=$content_mod;?>">
					<div class="card-item__card  is--news">
						<a href="<?=$link;?>" class="card-item__preview  is--news">
							<img src="<?=$preview;?>" alt="<?=$title;?>" class="img-responsive">
						</a>
						<time class="card-item__date  is--news" datetime="<?=$date_iso;?>"><?=$date;?></time>
						<h3 class="card-item__heading  is--news"><a href="<?=$link;?>"><?=$title;?></a></h3>
						<div class="card-item__heading-small  is--news"><?=$note;?></div>
					</div>
				</div>							
				<?
					}
				}
				?>
			</div>
		</div>
	</div>
</main>