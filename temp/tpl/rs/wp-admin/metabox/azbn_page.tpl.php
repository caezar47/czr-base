<?
global $post;

$prefix = $param['prefix'];
$field = $param['box']['field'];

$post_id = $post->ID;

$this->tpl('wp-admin/metabox/_style', array());
?>
<div class="azbnbasetheme-metabox" >
<?

wp_nonce_field('azbn_page', $prefix.'wpnonce', false, true);





function __select_tpl_file_tree($basedir = '', $dir = '', $adir = '', $value = '') {
	
	$fp = opendir($basedir . $dir);
	
	while($cv_file = readdir($fp)) {
		
		$_file = $dir . '/' . $cv_file;
		
		if(is_file($basedir . $_file)) {
			
			$sub_filename = $adir . '/' . $cv_file;
			
			if($sub_filename[0] == '/') {
				$sub_filename = substr($sub_filename, 1);
			}
			
			$sub_filename = strtr($sub_filename, array('.tpl.php' => ''));
			
			$_sub_filename_wp_admin = substr($sub_filename, 0, 8);
			
			if($_sub_filename_wp_admin != 'wp-admin' && substr($sub_filename, 0, 1) != '_') {
				
				?>
				
				<option value="<?=$sub_filename;?>" <? if($value == $sub_filename) {echo 'selected';}?> data-value="<?=$value;?>" ><?=$sub_filename;?></option>
				
				<?
				
			}
			
		} elseif ($cv_file != '.' && $cv_file != '..' && is_dir($basedir .$dir . '/' . $cv_file)) {
			
			__select_tpl_file_tree($basedir, $_file, $adir . '/' . $cv_file, $value);
			
		}
	}
	
	closedir($fp);
	
}





foreach ($field as $f) {
	$name =  $prefix.$f['name'];
	$in_db = get_post_meta($post_id, $name, true);
	if(!$in_db || $in_db == '') {
		//$value = $f['default'];
	} else {
		$value = $in_db;
	}
	?>
	
	<div class="input-block " >
		<label><?=$f['label'];?></label>
		<div class="" >
		<?
		switch($f['type']) {
			
			case 'select_tpl_file' : {
				
				echo '<select id="'.$name.'" name="'.$name.'" data-value="' . $value . '" >';
				
				__select_tpl_file_tree(__DIR__, '/../..', '', $value);
				
				echo '</select>';
				
			}
			break;
			
			default: {
				echo '<input type="text" id="'.$name.'" name="'.$name.'" value="'.$value.'" />';
			}
			break;
			
		}
		?>
		</div>
	</div>
	
	<?
}

?>

</div>