
<? echo $this->Html->link("Revenir au site", "/homes"); ?> |
Gérer les :
<? echo $this->Html->link("Documents", "/admin/documents/index");?> |
<? echo $this->Html->link("Devoirs", "/admin/events/index"); ?> | 
<? echo $this->Html->link("Matières", "/admin/subjects/index"); ?> |
<? echo $this->Html->link("Années", "/admin/years/index"); ?> |
<? echo $this->Html->link("Écoles", "/admin/schools/index"); ?> - 
<? echo $this->Html->link("Liste des élèves", "/admin/students/index");?>
<? if($this->Session->read('current_user.auth_level') >= 5) { 
	echo ' | '.$this->Html->link('Gérer les classes', '/admin/classrooms/index');
	echo ' | '.$this->Html->link('Statistiques', '/admin/visits/index');
	echo ' | '.$this->Html->link('Tableau de bord', '/admin/homes/panel');
	
}?>

