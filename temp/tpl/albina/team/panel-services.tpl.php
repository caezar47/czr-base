<?
$projects = new WP_Query(array(
	'post_type' => 'ourteam',
	'posts_per_page' => -1,
	'order' => "DESC",
	'orderby' => "date title",
	'post__in' => $param["block_id"]
	
));
?>	
<div class="page-header__block  is--center">
	<h2 class="page-header__heading  is--center"><span>Специалисты</span></h2>		
</div>
<div class="<?=$param["block_prefix"];?>row row  is--gutter  is--jcc  is--wrap">
	
<?
	while($projects->have_posts()) {
		$projects->the_post();
		$id = get_the_ID();
		$link = l($id);
		$title = t($id);
		$preview = $this->Imgs->postImg($p->ID, '375x480');
		$position = get_field('team_post', $id);
		if($preview == ""){
			$preview = "http://via.placeholder.com/375x480";
		}
	?>
	<div class="<?=$param["block_prefix"];?>cols cols  is--cols-screen-3  is--cols-sm-6  is--cols-sm-l-4  is--cols-xs-l-6">
		<div class="team-card__item">
			<a href="<?=$link;?>" class="team-card__preview block-hover__block">
				<img src="<?=$preview;?>" alt="<?=$title;?>"  class="block-hover__img  img-responsive"> 
				<div class="block-hover__item">
					<div class="block-hover__icon"> 
						<div class="block-hover__icon-inner">
							<svg class="icon-svg icon-plus" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#plus"></use></svg>
						</div>
					</div>
				</div>
			</a> 			
			<div class="team-card__note">
				<h4 class="team-card__heading"><a href="<?=$link;?>"><?=$title;?></a></h4>
				<?if($position != ""){?>
				<div class="team-card__text-block  text__block"><?=$position;?></div>
				<?}?>
			</div> 
		</div>
	</div>			
	<?
	}
	wp_reset_postdata();
	?>	
</div>