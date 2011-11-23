<div class="area">
	
	<div class="page-header"><h2>Inscrire une classe</h2></div>
	<p>Pour remplir une classe, veuillez remplir le formulaire ci-dessous, votre demande sera examinée par un administrateur du service et une réponse vous sera envoyée par e-mail ou sur facebook pour continuer la procédure. Si vous voulez garder le contact grâce à Facebook, rejoignez simplement la page du site Cahier en ligne.</p><br/ >
	
	<?php echo $this->Session->flash(); ?>

	<div class="row">
		<div class="span5">
			<h3>Vos informations</h3>
			<?php   echo $this->Form->create(array('action' => 'signup', 'class' => 'form-stacked'));?>
			<div class="clearfix">
			<?php   echo $this->Form->input('name', array('label' => 'Prénom et Nom'));?>	
			</div>

			<div class="clearfix">
				<?php   echo $this->Form->input('e-mail', array('label' => 'E-mail'));?>
			</div>
			<br>
			<? echo $this->Html->image('stamp.jpg');?>

		</div>

		<div class="span9">

			<h3>Informations concernant la classe</h3>
						
			<div class="form-stacked">
			<div class="clearfix">
			<div class="input">
			<? echo $this->Form->input('type', array('label'=> 'Nom de la classe', 'placeholder'=> '1ère S3, TS5 etc.'))?>
			</div>
				
			</div>	
			
			<div class="clearfix">
			<div class="input">
			<? echo $this->Form->input('studentnumbers', array('label' =>"Nombre d'élèves", 'placeholder'=> 'Le nombre d\'élèves estimé'));?>
			</div>
				
			</div>
			
			<div class="clearfix">
			<div class="input">
			<? echo $this->Form->input('motivation', array(
				'type' => 'textarea', 
				'label' => 'Pourquoi pensez-vous que le Cahier en ligne servirait dans votre classe ?', 
				'placeholder'=> 'Pourquoi pensez-vous que le Cahier en Ligne sera une solution efficace dans votre classe ?', 
				'class' => 'xxlarge'))?>
			</div>
				
			</div>
			</div>
		</div>
	</div>



		
	
	<? //echo $smtp_errors;?>
</div>
		<div class="actions">
			<? echo $this->Form->submit('Poster la demande !', array('class' => 'btn primary', 'style' => 'position:relative;left : -120px'));?>
		</div>
