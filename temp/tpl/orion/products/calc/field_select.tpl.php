<?
//__theme_ed($param['not_bound']);
?>

<div class="calc-panel__calc-cols cols azbn__calc__field" data-uid="<?=$param['field']['uid'];?>" >
	<form class="azbn__calc__field-form" >
		<div class="select-block__block">
			<label class="select-block__row row">
				<div class="cols select-block__cols">
					<div class="select-block__heading"><?=$param['field']['label'];?>:</div>
				</div>
				<div class="cols select-block__cols">
					<div class="select-block__select-box">
						<div class="select-block__select-icon">
							<svg class="icon-svg icon-btn-icon-down" role="img">
								<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#btn-icon-down"></use>
							</svg>
						</div>
						<select class="select-block__select">
							<option value="" disabled >Выберите</option>
							<?
							if(count($param['field']['values'])) {
								foreach($param['field']['values'] as $v => $t) {
									
									$data_bounds_arr = array();
									
									if(is_array($param['not_bound'][$v])){
										foreach($param['not_bound'][$v] as $b_k => $b_v_arr) {
											foreach($b_v_arr as $b_v) {
												$data_bounds_arr[] = $b_k . '__' . $b_v;
											}
										}
									}
									
							?>
							<option value="<?=$v;?>" <?if($v == $param['field']['value']){echo 'selected';}?> data-not_bound-me="<?=$param['field']['uid'];?>__<?=$v;?>" data-not_bound-to="<?if(count($data_bounds_arr)){echo implode(' ', $data_bounds_arr);}?>" ><?=$t;?></option>
							<?
								}
							}
							?>
						</select>
					</div>
				</div>
			</label>	
		</div>
	</form>
</div>