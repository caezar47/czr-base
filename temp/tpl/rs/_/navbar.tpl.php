<?
	$__prefix = $param["block_prefix"];
	$email = getContact('email');
	$email_arr = explode('@', $email);
	$phone = getContact('phone');	
	$phone_num = phone(getContact('phone'));
	$adds = getContact('adds');
	$clock = getContact('clock');
?>
<nav class="navbar-site scroll navbar scroll-navbar">
	<div class="<?=$__prefix;?>inner">
		<div class="container <?=$__prefix;?>container">
			<div class="row <?=$__prefix;?>row">
				<div class="cols <?=$__prefix;?>cols  is--header"> 	
					<div class="<?=$__prefix;?>header">
						<div class="row <?=$__prefix;?>row-header ">
							<div class="cols <?=$__prefix;?>cols-header  is--hamburger">
								<div class="<?=$__prefix;?>hamburger">
									<button class="<?=$__prefix;?>hamburger-btn hamburger__item" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false" data-toggle-nav=".navbar-site" data-body="html" data-collapse-nav=".<?=$__prefix;?>collapse">
										<span class="hamburger__line  is--left"></span>
										<span class="hamburger__line  is--center"></span>
										<span class="hamburger__line  is--right"></span>
									</button>
								</div>
							</div>
							<div class="cols <?=$__prefix;?>cols-header  is--brand">
								<a class="<?=$__prefix;?>brand" href="/">
									<svg class="icon-svg icon-logotip" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#logotip"></use></svg>
								</a>
							</div>
							<div class="cols <?=$__prefix;?>cols-header  is--tel">
								<a href="tel:{{contacts.phone_tel}}" class="<?=$__prefix;?>tel  is--icon">
									<svg class="icon-svg icon-tel" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#tel"></use></svg>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="cols <?=$__prefix;?>cols  is--collapse">
					<div class="<?=$__prefix;?>collapse" >
						<div class="<?=$__prefix;?>collapse-inner">
							<div class="row <?=$__prefix;?>collapse-row">
								<div class="cols <?=$__prefix;?>collapse-cols cols  is--nav">
									<ul class="<?=$__prefix;?>nav">
										<?
											$menu_items_bottom = $this->getMenu(2);
											
											if(count($menu_items_bottom)) {
												
												$__menu_array = array(
													'items' => array(),
													'structure' => array(),
												);
												
												foreach($menu_items_bottom as $item) {
													$__menu_array['items'][$item->ID] = $item;
													$__menu_array['structure'][$item->menu_item_parent][] = &$__menu_array['items'][$item->ID];
												}
												
												if(count($__menu_array['structure'][0])) {
													foreach($__menu_array['structure'][0] as $item_sub0) {
														
														$item_class = '';
														if($item_sub0->object_id == $this->post['id']){
															$item_class = $item_class . ' is--active ';
														}							
														?>
														<li class="<?=$__prefix;?>nav-item <?=$item_class;?> ">
															<a href="<?=$item_sub0->url;?>" class="<?=$__prefix;?>nav-link"><span><?=$item_sub0->title;?></span></a>
														</li>
														<?
													}
												}
											}
										?>
									</ul>
								</div>
								<?if ($phone != ""){?>
								<div class="cols <?=$param["block_prefix"];?>collapse-cols  is--contacts" >
									<div class="<?=$param["block_prefix"];?>tel-block">
										<a href="tel:+<?=$phone_num?>" class="<?=$param["block_prefix"];?>tel"><?=$phone;?></a>
									</div>
								</div>
								<?}?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>