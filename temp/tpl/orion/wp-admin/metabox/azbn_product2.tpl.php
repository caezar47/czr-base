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
		$value = '{}';
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
					<label>Название</label>
					<input class="row__title" value="" />
				</div>
				
				<div class="item-col" >
					<label>Изображение <a href="#add-image" class="row-action-add-image " >выбр.</a></label>
					<input class="row__img" value="" />
				</div>
				
				<div class="item-col size-2" >
					<label>HTML</label>
					<textarea class="row__html" ></textarea>
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
		
		var result = [];
		
		items.find('.product-cost-row').each(function(index){
			
			var _row = $(this);
			
			var item_data = {
				title : _row.find('.row__title').val() || '',
				img : _row.find('.row__img').val() || '',
				html : _row.find('.row__html').val() || '',
			};
			
			result.push(item_data);
			
		});
		
		result_value.val(JSON.stringify(result));
		
	}
	
	var cloneIdealItem = function(item) {
		var _row = ideal_item.clone(true);
		_row.appendTo(items);
		if(item) {
			_row.find('.row__title').val(item.title);
			_row.find('.row__img').val(item.img);
			_row.find('.row__html').val(item.html);
		}
	};
	
	var ideal_item = items.find('.product-cost-row').eq(0);
	
	ideal_item.find('input, select, textarea').on('focus change blur click keyup', function(event){
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
	
	ideal_item.find('.row-action-add-image').on('click', function(event){
		event.preventDefault();
		
		var btn = $(this);
		var img_input = btn.closest('.item-col').find('.row__img');
		
		var image = wp.media({ 
			title: 'Загрузить изображение',
			multiple: false
		})
			.open()
			.on('select', function(e){
				var uploaded_image = image.state().get('selection').first();
				//console.log(img_input);
				//var image_url = uploaded_image.toJSON().url;
				
				img_input.val(uploaded_image.attributes.url);
				compileResultValue();
			});
		
	});
	
	
	cont.find('.controls .row-action-dubl').on('click', function(event){
		event.preventDefault();
		cloneIdealItem();
		compileResultValue();
	});
	
	ideal_item.detach();
	
	<?
	if($value == '{}') {
	?>
	//cloneIdealItem();
	<?
	} else {
		if(count($value_o)) {
			foreach($value_o as $m_arr) {
				?>
				cloneIdealItem(<?=json_encode($m_arr);?>);
				<?
			}
		} else {
		
		}
	}
	?>
	
	//cloneIdealItem();
	
	compileResultValue();
	
})(jQuery);
</script>