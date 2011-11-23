<div class = "area">
<div class="page-header"><h3> Bienvenue sur le Cahier en Ligne </h3></div>
<?php echo $this->Session->flash(); ?>
<p>Bienvenue sur le cahier en ligne de la classe, avant de pouvoir utiliser le service il vous faut changer le mot de passe</p><br/>

<? echo $this->Form->create('Student', array('action' => 'editpassword', 'class' => 'form-stacked'));?>
	<div class="clearfix">
	<?php echo $this->Form->input('old_password', array('type' => 'password', 'label' => 'Entrez votre ancien mot de passe', 'placeholder' => '****************'));?>
	<span class="help-inline">Si vous vous connectez pour la première fois, entrez le mot de passe donné par e-mail</span>
	</div>
   
   <div class="clearfix">
   <?php echo $this->Form->input('password', array('label' => "Entrez votre nouveau mot de passe personnel", 'placeholder' => '****************'));?>
   <span class="help-inline">Entrez votre nouveau mot de passe</span>
   </div>
    
    <div class="clearfix">
    <?php echo $this->Form->input('confirm_password', array('type' => 'password', 'label' => "Confirmez votre nouveau mot de passe", 'placeholder' => '****************'));?>
    <span class="help-inline">Confirmez pour ne pas faire d'erreur</span>
    </div>
    

</div>
<div class="actions">
<?php echo $this->Form->submit('Modifier le mot de passe', array('class' => 'btn', 'style' => 'position:relative;right : 110px'));?>
</div>
