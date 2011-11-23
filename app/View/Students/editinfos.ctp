<h3>Modifiez mes informations personnelles
</h3>
<? echo $this->Form->create('Student');?>
	<? echo $this->Form->input('name', array('label' => 'Prénom et Nom'));?>
	<? echo $this->Form->input('email', array('label' => 'Adresse e-mail'));?>
	
	<? echo $this->Html->link('Modifier mon mot de passe', '/students/editpassword', array('class' => 'btn'))?>
	<? echo $this->Form->submit("Modifier mes informations", array('class' => 'btn'));?>
	