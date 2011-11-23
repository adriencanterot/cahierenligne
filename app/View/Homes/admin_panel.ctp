<div id = 'home'>
	<div id = 'widget1'>
	<h3>Classes</h3>
	<ul>
		<li><? echo $this->Html->link("+ Ajouter une classe", '/admin/classrooms/add');?></li>
		<li><? echo $this->Html->link("Voir les classes", '/admin/classrooms/index');?></li>
		<br/>
		<hr/ >
		<br/>
		<li><? echo $this->Html->link('+ Ajouter une année', '/admin/years/add');?></li>
	</ul>
	</div>
	<div id = 'widget2'>
	<h3>Élèves</h3>
<ul>
	<li><? echo $this->Html->link("+ Ajouter un Élève", '/admin/students/add');?></li>
	<li><? echo $this->Html->link("Voir tous les Élèves", '/admin/students/index');?></li>
	<li><? echo $this->Html->link("Statistiques", '/admin/visits/index');?></li>

</ul>
</div>
	<div id = 'widget3'>
		<h3>Documents</h3>
		hey
	</div>
	<div id = 'widget4'>
		<h3>Devoirs</h3>
		adasd
	</div>
</div>
