<?
$about_id = $param["about_id"];
$about_team_heading = get_field('about_team_heading', $about_id);
$about_team_note = get_field('about_team_note', $about_id);
$about_team_preview = get_field('about_team_preview', $about_id);

$preview = $this->Imgs->rawImg($about_team_preview, '933x470');
$preview_fancy = $this->Imgs->rawImg($about_team_preview, 'fancybox_full');

$projects = new WP_Query(array(
	'post_type' => 'ourteam',
	'posts_per_page' => -1,
	'order' => "DESC",
	'orderby' => "date title",
));
?>
<div class="<?=$param["block_prefix"];?>block">
	<div class="container <?=$param["block_prefix"];?>container">
		<div class="<?=$param["block_prefix"];?>note">
			<div class="<?=$param["block_prefix"];?>row row  is--gutter  is--wrap  is--aic">
				<?if ($preview != ""){?>
				<div class="<?=$param["block_prefix"];?>cols cols  is--cols-screen-7  is--cols-sm-6">
						<picture class="<?=$param["block_prefix"];?>preview-picture">  
							<img src="<?=$preview;?>" alt="">
						</picture>					
					<?/*
					== шаблон для вывода через fancybox ==
					<a href="<?=$preview_fancy;?>" data-fancybox="about-team">
						<picture class="<?=$param["block_prefix"];?>preview-picture">  
							<img src="<?=$preview;?>" alt="">
						</picture>
					</a>
					*/?>
				</div>
				<?}?>
				<?if ($about_team_note != ""){?>
				<div class="<?=$param["block_prefix"];?>cols cols  is--cols-screen-5  is--cols-sm-6">
					<div class="<?=$param["block_prefix"];?>text-block  text__block">
						<?if ($about_team_heading != ""){?>
						<h2 class="<?=$param["block_prefix"];?>heading"><?=$about_team_heading;?></h2>
						<?}?>
						<?=$about_team_note;?>
					</div>
				</div>
				<?}?>
			</div>
		</div>
		<div class="<?=$param["block_prefix"];?>owl owl-block">
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
			<?
			}
			wp_reset_postdata();
			?>	
		</div>
	</div>
</div>