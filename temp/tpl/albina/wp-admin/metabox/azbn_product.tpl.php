<?
global $post;

$prefix = $param['prefix'];
$field = $param['box']['field'];

$post_id = $post->ID;

$this->tpl('wp-admin/metabox/_style', array());
?>

<div class="azbnbasetheme-metabox" id="azbn-product-costs-container" >
<?

wp_nonce_field('azbn_product', $prefix.'wpnonce', false, true);

foreach ($field as $f) {
	$name =  $prefix.$f['name'];
	$in_db = get_post_meta($post_id, $name, true);
	if(!$in_db || $in_db == '') {
		//$value = $f['default'];
		$value = '';
	} else {
		$value = $in_db;
	}
	$value_o = json_decode($value, true);
	?>
	
	<div class="input-block " >
		<div class="hidden" >
			<textarea class="result-value" id="<?=$name;?>" name="<?=$name;?>" ></textarea>
		</div>
		<div class="items" >
			<div class="product-cost-row" >
				
				<div class="item-col" >
					<label>Mатериал</label>
					<select class="row__material" >
						<option value="wood" >Дерево</option>
						<option value="metal" >Металл</option>
						<option value="glass" >Стекло</option>
					</select>
				</div>
				
				<div class="item-col" >
					<label>Длина, мм</label>
					<input class="row__x" value="0" />
				</div>
				
				<div class="item-col" >
					<label>Глубина, мм</label>
					<input class="row__y" value="0" />
				</div>
				
				<div class="item-col" >
					<label>Цена, руб.</label>
					<input class="row__cost" value="0" />
				</div>
				
				<div class="item-col _functions" >
					<label>&nbsp;</label>
					<!--
					<a href="#dubl" class="row-action-dubl" >Дубл.</a>
					|
					-->
					<a href="#delete" class="row-action-del button button-primary button-small" >Удал.</a>
				</div>
				
				<div class="clear" ></div>
				
			</div>
		</div>
		<div class="controls" >
			<a href="#dubl" class="row-action-dubl button button-primary button-small" >Добавить</a>
		</div>
	</div>
	
	<?
}

?>

</div>
<script>
(function($){
	
	var cont = $('#azbn-product-costs-container');
	var result_value = cont.find('.result-value');
	var items = cont.find('.items');
	
	var compileResultValue = function(){
		
		var result = {};
		
		items.find('.product-cost-row').each(function(index){
			
			var _row = $(this);
			
			var material = _row.find('.row__material').val() || 0;
			
			var cost = {
				material : material,
				x : parseInt(_row.find('.row__x').val()) || 0,
				y : parseInt(_row.find('.row__y').val()) || 0,
				cost : parseInt(_row.find('.row__cost').val()) || 0,
			};
			
			//result.push(cost);
			
			if(result[material]) {
				
			} else {
				result[material] = [];
			}
			
			result[material].push(cost);
			
		});
		
		result_value.val(JSON.stringify(result));
		
	}
	
	var cloneIdealItem = function(item) {
		var _row = ideal_item.clone(true);
		_row.appendTo(items);
		if(item) {
			_row.find('.row__material').val(item.material);
			_row.find('.row__x').val(item.x);
			_row.find('.row__y').val(item.y);
			_row.find('.row__cost').val(item.cost);
		}
	};
	
	var ideal_item = items.find('.product-cost-row').eq(0);
	
	ideal_item.find('input, select').on('focus change blur click keyup', function(event){
		compileResultValue();
	});
	
	ideal_item.find('.row-action-dubl').on('click', function(event){
		event.preventDefault();
		cloneIdealItem();
		compileResultValue();
	});
	
	ideal_item.find('.row-action-del').on('click', function(event){
		event.preventDefault();
		if(confirm('Удалить цену?')) {
			$(this).closest('.product-cost-row').empty().remove();
			compileResultValue();
		}
	});
	
	cont.find('.controls .row-action-dubl').on('click', function(event){
		event.preventDefault();
		cloneIdealItem();
		compileResultValue();
	});
	
	ideal_item.detach();
	
	<?
	if($value == '') {
	?>
	cloneIdealItem();
	<?
	} else {
		if(count($value_o)) {
			foreach($value_o as $m_arr) {
				if(count($m_arr)) {
					foreach($m_arr as $item) {
						?>
						cloneIdealItem(<?=json_encode($item);?>);
						<?
					}
				} else {
				?>
				cloneIdealItem();
				<?
				}
			}
		} else {
		?>
		cloneIdealItem();
		<?
		}
	}
	?>
	
	//cloneIdealItem();
	
	compileResultValue();
	
})(jQuery);
</script>