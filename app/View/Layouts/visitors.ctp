<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Cahier en Ligne - Bienvenue
	</title>
	<link rel="stylesheet/less" href="<? echo $this->Html->url('/less/visitors/bootstrap.less');?>">

	<?php
		echo $this->Html->meta('icon');

		
		echo $this->Html->script('addremove.js');
		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('wysiwyg');
		echo $this->Html->script('less');

		
		echo $this->Html->script('app.js');

		echo $scripts_for_layout;
	?>

</head>
<body>
	<div class="container">
	<div class="row">
		<div class="span16">
		    
			<?php echo $content_for_layout; ?>
		</div>
	</div>




		</div>

		<div id="footer">

		</div>
	</div>
	<!-- <pre><? //print_r($session->read('current_user'))?></pre> -->
		<script type="text/javascript">	
	$(function() {
    	$('.alert-message .close, .hero-unit .close').live('click', function() {
    		$(this).parent().slideUp();
    	});
  });</script>
	<? echo $this->Js->writeBuffer();?>
</body>
</html>