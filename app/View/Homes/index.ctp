<!--<div class="hero-unit">
<a class="close" href="#">×</a>

<h2>Bienvenue sur le Cahier en Ligne</h2> <p>Le service en ligne de partage de documents au lycée</p>
<a class="btn primary large">Faire un Tour !</a></div>
<br/>-->

<div class="page-header"><h2 style = 'display:inline;'>Les Annonces</h2> <a onclick='showhide(".notice_form")' class = 'btn primary pull-right' style = 'position:relative;bottom:5px;'>Faire passer une annonce à la classe</a></div>
<? echo $this->element('notice_form');?>
<? echo $this->requestAction('/Notices/liste')?>
<br/>
<? echo $this->Html->link(' Voir toutes les annonces', '/notices/index', array('class' => 'btn'));?>

	
<div class = 'row'>
	<div class = 'span4'>
		<h3>Derniers documents</h3>
			<? echo $this->element('documents', array('documentlist' => $lastdocuments))?><br/>
			<? echo $this->Html->link('Ajouter un document', '/documents/add', array('class' => 'btn', 'id' => 'addDocument'));?><br/>

	</div>

	<div class = 'span5'>
	<h3>Dernières discussions</h3>
		<ul>
    	<? foreach($lastdiscussions as $e) {
			echo '<li>';
			echo $this->Html->link($e['Student']['name'].' sur '.h($e['Document']['name']).''.h($e['Event']['name']).' en '.$e['Document']['Subject']['name'].''.$e['Event']['Subject']['name'].'',
			'/'.((!empty($e['Document']['name']) ? 'documents' : 'events').'/view/'.(!empty($e['Document']['id']) ? $e['Document']['id'] : $e['Event']['id'])));
			echo '</li>';
		}?>
		</ul>

	</div>
</div>
