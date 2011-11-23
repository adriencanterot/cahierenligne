<div class="row" style="margin:auto;">

<div class = 'span6 offset1'>
	<div class="area">
		<div class="page-header"><h2>Cahier en Ligne</h2></div>
		<h4>Bienvenue</h4>
		<p>Bienvenue sur le Cahier en ligne.
		Ce service vous propose de consulter les cours et les devoirs de la classe. Il est possible de les commenter pour demander de l'aide ou signaler une erreur à un camarade.</p><br/>
		
		<h4>Comment se connecter ?</h4>
		<p>Pour se connecter, il faut avoir reçu un e-mail contenant un mot de passe puis les rentrer dans le formulaire ci-après.</p>
		<br/>
		<h4>Comment inscrire ma classe ?</h4>
		<p>Pour ouvrir une classe, il faut remplir ce formulaire et attendre la réponse d'un administrateur du service.</p>
		<? echo $this->Html->link('Inscrire sa Classe', '/classrooms/signup
		', array('class'=> 'btn primary'))?><br/ ><br/ >
	</div>
	</div>
	<div class = 'span6 offset2'>
		<div class="area">

		<?php echo $this->Session->flash(); ?>
		

		<h3>Connectez-vous</h3>    


				<?php echo $this->Form->create(false, array('class' => 'form-stacked')); ?>

		    <br>
		    <div class="clearfix">
		    	<?php echo $this->Form->input('email', array('class' => 'input', 'placeholder' => 'exemple@mail.com')); ?>
		    </div>
		    <br>
		    <div class="clearfix">
		    	<?php echo $this->Form->input('password', array('label' => 'Mot de passe','class' => 'input', 'placeholder' => '*********')); ?>
		    </div>
		    <br>

	</div>
		    <div class="actions">
		    	<?php echo $this->Form->submit('Se Connecter', array('class' => 'btn success', 'style'=>'position:relative;right:130px')); ?>

		    </div>

	</div>

</div>



