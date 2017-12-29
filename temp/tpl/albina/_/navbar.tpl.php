<?
	$email = getContact('email');
	$email_arr = explode('@', $email);
	$phone = getContact('phone');	
	$phone_num = phone(getContact('phone'));
	$adds = getContact('adds');
	$clock = getContact('clock');
?>
<nav class="navbar-site scroll navbar scroll-navbar">
	<div class="<?=$param["block_prefix"];?>inner">
		<div class="container <?=$param["block_prefix"];?>container">
			<div class="row <?=$param["block_prefix"];?>row">
				<div class="cols <?=$param["block_prefix"];?>cols  is--header"> 	
					<div class="<?=$param["block_prefix"];?>header">
						<div class="row <?=$param["block_prefix"];?>row-header ">
							<div class="cols <?=$param["block_prefix"];?>cols-header  is--hamburger">
								<div class="<?=$param["block_prefix"];?>hamburger">
									<button class="<?=$param["block_prefix"];?>hamburger-btn hamburger__item" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false" data-toggle-nav=".navbar-site" data-body="html" data-collapse-nav=".<?=$param["block_prefix"];?>collapse">
										<span class="hamburger__line  is--left"></span>
										<span class="hamburger__line  is--center"></span>
										<span class="hamburger__line  is--right"></span>
									</button>
								</div>
							</div>
							<div class="cols <?=$param["block_prefix"];?>cols-header  is--brand">
								<a class="<?=$param["block_prefix"];?>brand" href="/">
									<svg class="icon-svg icon-logotip" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#logotip"></use></svg>
								</a>
							</div>
							<div class="cols <?=$param["block_prefix"];?>cols-header  is--tel">
								<a href="tel:{{contacts.phone_tel}}" class="<?=$param["block_prefix"];?>tel  is--icon">
									<svg class="icon-svg icon-tel" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#tel"></use></svg>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="cols <?=$param["block_prefix"];?>cols  is--collapse">
					<div class="<?=$param["block_prefix"];?>collapse" >
						<div class="<?=$param["block_prefix"];?>collapse-inner">
							<div class="row <?=$param["block_prefix"];?>collapse-inner-row">
								<div class="cols <?=$param["block_prefix"];?>collapse-inner-cols  is--top">
									<div class="row <?=$param["block_prefix"];?>collapse-row">
										<?if ($adds != ""){?>
										<div class="cols <?=$param["block_prefix"];?>collapse-cols  is--address" >
											<div class="<?=$param["block_prefix"];?>address" ><?=$adds;?></div> 
										</div>
										<?}?>
										<?if ($clock != ""){?>
										<div class="cols <?=$param["block_prefix"];?>collapse-cols  is--clock" >
											<div class="<?=$param["block_prefix"];?>address" >Ежедневно с <?=$clock;?></div>
										</div>										
										<?}?>
										<div class="cols <?=$param["block_prefix"];?>collapse-cols  is--soc" >
											<?
												$this->tpl(
													'_/social', 
													array(
														"block_prefix"=>"social__",
														"block_mod"=>"is--navbar",
													)
												);
											?>
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
								<div class="cols <?=$param["block_prefix"];?>collapse-inner-cols  is--bottom">
									<div class="row <?=$param["block_prefix"];?>collapse-row">
										<div class="cols <?=$param["block_prefix"];?>collapse-cols cols  is--nav">
											<ul class="<?=$param["block_prefix"];?>nav">
												<li class="<?=$param["block_prefix"];?>nav-item  dropdown">
														<a href="<?=l(7);?>" class="dropdown-toggle <?=$param["block_prefix"];?>nav-link  is--services" data-toggle="dropdown"><span><?=t(7);?></span></a>
														<div class="<?=$param["block_prefix"];?>nav-dropdown dropdown-menu">
															<div class="container <?=$param["block_prefix"];?>nav-dropdown-container">
																<div class="<?=$param["block_prefix"];?>nav-dropdown-row  row  is--gutter  is--wrap">
																<?
																	$menu_items_bottom = $this->getMenu(32);
																	//__theme_ed($menu_items_bottom);
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
																				if(count($__menu_array['structure'][$item_sub0->ID])) {
																				?>																				
																				<div class="<?=$param["block_prefix"];?>nav-dropdown-cols  cols  is--cols-screen-3">
																						<ul class="<?=$param["block_prefix"];?>nav-dropdown-category">
																						<?
																							foreach($__menu_array['structure'][$item_sub0->ID] as $__index => $item_sub1) {
																						?>			
																								<li class="<?=$param["block_prefix"];?>nav-dropdown-category-item <?if($__index == 0){echo 'active';}?> ">
																									<a href="#categoru-<?=$item_sub1->ID;?>" data-toggle="tab-dropdown" class="<?=$param["block_prefix"];?>nav-dropdown-category-link"><span><?=$item_sub1->title;?></span></a>
																								</li>
																						<?
																							}
																						?>
																					</ul>
																				</div>																				
																				<?																				
																				} 																				
																			}
																		}
																		if(count($__menu_array['structure'][0])) {
																			foreach($__menu_array['structure'][0] as $item_sub0) {
																				$item_class = '';
																				if($item_sub0->object_id == $this->post['id']){
																					$item_class = $item_class . ' is--active ';
																				}
																				if(count($__menu_array['structure'][$item_sub0->ID])) {
																				?>																				
																				<div class="<?=$param["block_prefix"];?>nav-dropdown-cols  cols  is--cols-screen-9">
																						<div class="<?=$param["block_prefix"];?>nav-dropdown-category-content">
																						<?
																							foreach($__menu_array['structure'][$item_sub0->ID] as $__index => $item_sub1) {
																						?>
																						<div class="<?=$param["block_prefix"];?>nav-dropdown-category-pane <?if($__index == 0){echo 'active';}?> " id="categoru-<?=$item_sub1->ID;?>">
																									<div class="<?=$param["block_prefix"];?>nav-dropdown-row row">
																										<?
																											$max_elements_in_col = ceil(count($__menu_array['structure'][$item_sub1->ID]) / 3);
																											$__cols= array_chunk($__menu_array['structure'][$item_sub1->ID], $max_elements_in_col);
																											foreach($__cols as $__col) {
																											?>
																											<div class="<?=$param["block_prefix"];?>nav-dropdown-cols cols  is--cols-screen-4">
																												<ul class="<?=$param["block_prefix"];?>nav-dropdown-menu">
																													<?foreach($__col as $item_sub2) {?>
																														<li class="navbar__nav-dropdown-item  is--link">
																															<a href="<?=$item_sub2->url;?>" class="navbar__nav-dropdown-link  is--link"><span><?=$item_sub2->title;?></span></a>
																														</li>
																													<?}?>
																												</ul>
																											</div>
																									<?}?>
																								</div>
																							</div>	
																						<?
																							}
																						?>
																					</div>																				
																				</div>																				
																				<?																				
																				} 																				
																			}
																		}
																	}
																?>
														</div>
												</li>
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
																
																if(count($__menu_array['structure'][$item_sub0->ID])) {
																
																?>
																
																<li class="<?=$param["block_prefix"];?>nav-item  dropdown">
																	<a href="#" class="dropdown-toggle <?=$param["block_prefix"];?>nav-link" data-toggle="dropdown"><span><?=$item_sub0->title;?></span></a>
																	<div class="<?=$param["block_prefix"];?>nav-dropdown dropdown-menu">
																		<div class="container <?=$param["block_prefix"];?>nav-dropdown-container">
																			<div class="<?=$param["block_prefix"];?>nav-dropdown-row  row  is--gutter  is--wrap">
																			<?
																				foreach($__menu_array['structure'][$item_sub0->ID] as $item_sub1) {
																			?>
																				<div class="<?=$param["block_prefix"];?>nav-dropdown-cols  cols">
																					<ul class="<?=$param["block_prefix"];?>nav-dropdown-menu">
																						<li class="<?=$param["block_prefix"];?>nav-dropdown-item">
																							<a href="<?=$item_sub1->url;?>" class="<?=$param["block_prefix"];?>nav-dropdown-link"><span><?=$item_sub1->title;?></span></a>
																						</li>
																					</ul>
																				</div>
																			<?
																				}
																			?>				
																			</div>
																		</div>
																	</div>
																</li>
																
																<?
																
																} else {
																	
																	?>
																	
																	<li class="<?=$param["block_prefix"];?>nav-item <?=$item_class;?> ">
																		<a href="<?=$item_sub0->url;?>" class="<?=$param["block_prefix"];?>nav-link"><span><?=$item_sub0->title;?></span></a>
																	</li>
																	
																	<?
																	
																}
																
															}
														}
													}
												?>
											</ul>
										</div>

										<div class="cols <?=$param["block_prefix"];?>collapse-cols cols  is--search">
												<a href="/?s=" class="<?=$param["block_prefix"];?>search"><svg class="icon-svg icon-btn-search" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#search"></use></svg></a>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>