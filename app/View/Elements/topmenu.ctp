<? if($this->Session->read('current_user.auth_level') == 5) { 
	echo $this->Html->link('Administration', '/admin/homes/panel').' | ';
	
}?>
<? echo $this->Html->link("Accueil", "/homes"); ?> |
<? echo $this->Html->link("Documents", "/documents");?> |
<? echo $this->Html->link("Devoirs", "/events"); ?> |
<? echo $this->Html->link("Se deconnecter", "/students/logout"); ?>


