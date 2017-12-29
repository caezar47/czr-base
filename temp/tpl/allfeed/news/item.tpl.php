<?
	$id = $this->post['id'];
	$__prefix="content-block__";
	$__mod="is--full";
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";
	$bread_prefix="breadcrumb__";
	$bread_mod="is--center";

	$heading = t($id);
	$content = c($id);
	$index_page = l(1);
	$parent_page_heading = t(4);
	$parent_page_link = l(4);

	$gallery = $this->Azbn->getMeta($id, 'gallery');
?>
<main class="<?=$__prefix;?>panel  <?=$__mod;?>"  role="main">
	<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
		<div class="<?=$__prefix;?>elem">
			<div class="text__container">
				<div class="text__inner">
					<div class="<?=$heading_prefix;?>panel  <?=$heading_mod;?>">
						<div class="<?=$bread_prefix;?>block  <?=$bread_mod;?>">
							<ul class="<?=$bread_prefix;?>list  <?=$bread_mod;?>">
								<li class="<?=$bread_prefix;?>list-item">
									<a href="<?=$index_page;?>" class="<?=$bread_prefix;?>list-link">Главная</a>
								</li>
								<li class="<?=$bread_prefix;?>list-item">
									<a href="<?=$parent_page_link;?>" class="<?=$bread_prefix;?>list-link"><?=$parent_page_heading;?></a>
								</li>
								<li class="<?=$bread_prefix;?>list-item is--active">
									<span class="<?=$bread_prefix;?>list-link"><?=$heading;?></span>
								</li>
							</ul>
						</div>		
						<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
							<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><?=$heading;?></h1>		
						</div>
					</div>
					<div class="<?=$__prefix;?>elem">
						<div class="text__block <?=$__prefix;?>text">
							<?=$content;?>
						</div>
					</div>
					<?if(is_array($gallery) && count($gallery)) {?>
					<div class="<?=$__prefix;?>elem">
						<div class="<?=$__prefix;?>row  row  is--wrap  is--gutter">
							<?			
								foreach($gallery as $id) {
									$preview = $this->mdl('Imgs')->rawImg($id, '400x250');
									$preview_full = $this->mdl('Imgs')->rawImg($id, 'fancybox');
							?>
							<div class="<?=$__prefix;?>cols cols  is--cols-4  is--gallery">
								<div class="card-item__card  is--gallery">
									<a href="<?=$preview_full;?>" data-fancybox="news-gellary" class="card-item__preview  is--gallery">
										<img src="<?=$preview;?>" alt="" class="img-responsive">
									</a>
								</div>
							</div>
							<? } ?> 
						</div>
					</div>
					<?}?>
				</div>
			</div>
		</div>
	</div>
</main>