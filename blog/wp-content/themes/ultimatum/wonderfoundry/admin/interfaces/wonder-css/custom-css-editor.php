<?php include( '../../../../../../../wp-load.php' );
global $wp_version;
?>
<!DOCTYPE html>
<html>
<head>
<script type='text/javascript' src='<?php bloginfo('wpurl');?>/wp-includes/js/jquery/jquery.js'></script>
<script type='text/javascript' src='<?php echo ULTIMATUM_ADMIN_ASSETS;?>/js/codemirror/lib/codemirror.js'></script>
<script type='text/javascript' src='<?php echo ULTIMATUM_ADMIN_ASSETS;?>/js/codemirror/mode/css/css.js'></script>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo ULTIMATUM_ADMIN_ASSETS;?>/js/codemirror/lib/codemirror.css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo ULTIMATUM_ADMIN_ASSETS; ?>/css/admin-style.css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo ULTIMATUM_URL; ?>/assets/css/font-awesome.min.css" />
</head>
<body class="css-editor">
<?php
if(isset($_REQUEST['layout_id'])){
	$layout_id = $_REQUEST['layout_id'];
	$option = THEME_SLUG.'_custom_css_'.$layout_id;
	$cssfile = 'layout_custom_'.$layout_id;
} elseif($_REQUEST['template_id']){
	$layout_id = $_REQUEST['template_id'];
	$option = THEME_SLUG.'_custom_template_css_'.$layout_id;
	$cssfile = 'template_custom_'.$layout_id;
}

if(strlen($_POST['custom_css'])!=0){
	update_option($option,$_POST['custom_css']);
	// save the CSS file
	$file = THEME_CACHE_DIR.DS.$cssfile.'.css';
	if(file_exists($file)){unlink($file);}
	$fhandle = @fopen($file, 'w+');
	if ($fhandle) fwrite($fhandle, stripslashes($_POST['custom_css']), strlen(stripslashes($_POST['custom_css'])));
}
$css=stripslashes(get_option($option));
?>
<form method="post" action="" id="css-editor-form">
<div class="fixed-top">
<div class="tb-closer"><i class="icon-off"></i> Close</div>
<div class="save-form" data-form="css-editor-form"><i class="icon-save"></i> <?php _e('Save', 'ultimatum');?></div>
</div>
<textarea id="custom_css" name="custom_css">
<?php echo $css; ?>
</textarea>
</form>
	<script type="text/javascript">
    var editor = CodeMirror.fromTextArea(document.getElementById("custom_css"), {
      mode: "text/css",
  	  styleActiveLine: true,
	  lineNumbers: true,
	  lineWrapping: true}
	  );
    jQuery('.tb-closer') .click(
			function() {
			self.parent.tb_remove();
				});
	jQuery('.save-form').each(function(){
			var form = jQuery(this).attr('data-form');
			jQuery(this).click(function(){
					jQuery('#'+form).submit();
				});
				});
    </script>
  </body>
</html>