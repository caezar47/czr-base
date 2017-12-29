<div class="modal fade <?=$param["block_prefix"];?>modal" id="<?=$param["block_modal_id"];?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog <?=$param["block_prefix"];?>dialog  <?=$param["block_mod"];?>">
		<div class="modal-body <?=$param["block_prefix"];?>body" >
			<button type="button" class="btn-site  <?=$param["block_prefix"];?>close  modal-close" data-dismiss="modal" aria-hidden="true">
				<svg class="icon-svg icon-modal-close" role="img">
					<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#modal-close"></use>
				</svg>
			</button>
			<div class="modal-content <?=$param["block_prefix"];?>content">
				<div class="page-header__block  is--modals">
					<h4 class="page-header__heading  is--modals"><span class="modal__response__message" ></span></h4>		
				</div>	
				<div class="<?=$param["block_prefix"];?>btn-row row  is--wrap  is--gutter10">
					<div class="<?=$param["block_prefix"];?>btn-cols cols">
						<div class="<?=$param["block_prefix"];?>btn">
							
							<a href="#next" class="btn__item is--sm azbn__calc__ordered__modal-close"><span>Продолжить</span></a>
							
						</div>
					</div> 	
				</div> 	
			</div> 
		</div>
	</div>
</div>