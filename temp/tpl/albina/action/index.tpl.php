<?
$bg_prefix="bg-block__";
$block_prefix="action-page__";

$projects = new WP_Query(array(
	'post_type' => 'ouraction',
	'posts_per_page' => -1,
));
?>
<div class="content-block <?=$block_prefix;?>content-block  <?=$bg_prefix;?>block" role="main">	
	<div class="container content-block__container <?=$block_prefix;?>container <?=$bg_prefix;?>container">
		<?
		// хлебные крошки первого уровня
		$this->tpl(
			'_/bread', 
			array(
				"block_prefix" => "breadcrumb__",
				"block_mod" => "is--heading  is--center"
			)
		);
		// заголовок страницы		
		$this->tpl(
			'_/heading', 
			array(
				"block_prefix" => "page-header__",
				"block_mod" => "is--heading  is--center"
			)
		);
		?>
		<div class="action-panel__block">			
			<div class="action-panel__row row  is--gutter  is--wrap">
				<?
				while($projects->have_posts()) {
					$projects->the_post();
					$id = get_the_ID();
					$link = l($id);
					$title = t($id);
					$preview = $this->Imgs->postImg($p->ID, '510x320');
					//$position = get_field('team_post', $id);
					if($preview == ""){
						$preview = "http://via.placeholder.com/510x320";
					}
				?>
				<div class="action-panel__cols cols  is--cols-screen-4  is--cols-sm-6">
					<div class="action-card__item  block-hover__block">
						<a href="<?=$link;?>" class="action-card__preview block-hover__block">
							<img src="<?=$preview;?>" alt="<?=$title;?>"  class="block-hover__img  img-responsive">  
							<div class="block-hover__item">
								<div class="block-hover__icon"> 
									<div class="block-hover__icon-inner">
										<svg class="icon-svg icon-plus" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#plus"></use></svg>
									</div>
								</div>
							</div>
						</a>			
					</div>
				</div>				
				<?
				}
				wp_reset_postdata();
				?>	
			</div>
		</div>
	</div>
</div>