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
		<?php echo 'Cahier en Ligne' ?>
	</title>


<link rel="stylesheet/less" href="/cakephp2.0/less/users/bootstrap.less">
	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('generic');
  //       echo $this->Html->css('cahier');
		echo $this->Html->css('wysiwyg');
		echo $this->Html->css('smoothness');
		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('wysiwyg');
		echo $this->Html->script('app');
		echo $this->Html->script('tablesorter');
		echo $this->Html->script('less');


		//echo $scripts_for_layout;
	?>

	<script type = "text/javascript">
	compteur = 1;
	function addElement(el){
		$(el).after("<input type='file' name='data[Document][file]["+compteur+"]' id='DocumentDocument' /><br/><br/>");
		compteur++;

	}
		</script>
</head>
<body>
	<div style='display:hidden'><?php echo $this->element('AddDocument');?></div>
	<div class="container-fluid">

		<div class="topbar">
		<div class="fill">
			<div class="container">
				<h3><a href="#">Cahier en Ligne - <? echo $this->Session->read('current_user.classroom.School.name');?></a></h3>
                    <ul class="nav">
                    	
							
							<li<? if($this->request->params['controller'] == 'homes')echo' class="active"'?>>

								<? echo $this->Html->link("Accueil", "/homes"); ?>

							</li>
							<li<? if($this->request->params['controller'] == 'documents') echo' class="active"'?>>

								<? echo $this->Html->link("Documents", "/documents");?>
							</li>
							
							<li<? if($this->request->params['controller'] == 'events')echo' class="active"'?>>
								
								<? echo $this->Html->link("Devoirs", "/events"); ?>
							</li>
							

							
							<li>
								<? echo $this->Html->link($this->Session->read('current_user.classroom.Classroom.name'), '#');?>
							</li>
							
							<li class = 'dropdown'>
								<a href="#" class = 'dropdown-toggle'><? echo $this->Session->read('current_user.name');?></a>

								<ul class = "dropdown-menu">
								<? if($this->Session->read('current_user.auth_level') == 5) { 
									echo '<li>'.$this->Html->link('Administration', '/admin/homes/panel').'</li>';
									
								}?>

									<li>
									<? echo $this->Html->link('Modifier mes informations', '/students/editinfos');?>
									</li>
									<li>
									<? echo $this->Html->link('Changer de mot de passe', '/students/editpassword');?>
									</li>
									<li>
										<? echo $this->Html->link("Se deconnecter", "/students/logout"); ?>
									</li>

							</li>
							
                   </ul>
                 </div>
            </div>
    	</div>
    	            <div class ="sidebar" style="padding-top:60px">

    	            <div class="page-header"><h2> Documents </h2></div>
                        
						<? echo $this->Html->link('Ajouter un document','/documents/add', array('class' => 'btn', 'id' => 'addDocument'));?><br/>
						<br/>
                       
                            <? echo $this->element('subjects_documents', array('subjectlist' => $subjectlist)); ?>
                        	<br/>
                            <? echo $this->element('notifications', array('notifications' => $notifications)); ?>

                    </div>


    			<div class="content" style="margin-top:60px">

                    <div class="span12">  
                    	<?php echo $this->Session->flash(); ?>

	                    <div id="data">
							<?php echo $content_for_layout; ?>
	                    </div>
			


                    </div>
                    <? if(isset($debug)) { echo('<pre>');
                                           print_r($debug); 
                                           echo('</pre>'); } ?>
                    </div>


                    <div class ="span4">
                        <h3>Devoirs à faire</h3>
                        <? echo $this->requestAction('/events/liste'); ?>
						<br/><hr/><br/>
                        <? echo $this->element('add_event', array('subjects' => $subjects,
                                                                  'documents' => $documents)); ?>
                        
                    </div>
                    
		<div id="footer">
                      
		</div>
	</div>
	<script type="text/javascript">	
	$(function() {
		$('.modal-document').hide();
    	$("table").tablesorter({ sortList: [[1,0]] });
    	$('.alert-message .close, .hero-unit .close').live('click', function() {
    		$(this).parent().slideUp();
    	});
    	$('.modal .close').live('click', function() {
    		$('.modal-document').hide();
    	});
    	$('a#addDocument').live('click', function() {
    		$('.modal-document').show();
    		return false;
    	});
    	$('a#close').live('click', function() {

    		$('.modal-document').hide();
    		return false;
    	});

    	$('.dropdown-toggle').live('click', function() {
    		if($('.dropdown-menu').is(':hidden')) {
    			$('.dropdown-menu').slideDown();
    		} else {
    			$('.dropdown-menu').slideUp();
    		}

    		
    	})
  });</script>
	<?php //echo $this->element('sql_dump'); ?>

	<? echo $this->Js->writeBuffer();?>
</body>
</html>