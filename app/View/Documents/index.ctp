<div class="page-header"><h2>Liste des derniers documents</h2></div>

<p>Pour voir un classement par matière, vous pouvez cliquer sur les noms de matières dans le menu de gauche.</p>
<br/>
<table class="zebra-striped">
	<thead>
		<th>Voir</th>
		
		<th>Titre</th>
		<th>Étudiant</th>
		<th>Date de publication</th>
		<th>Matière</th>
		
	</thead>
	
	<tbody>
	<? foreach($documentlist as $e): ?>
	<tr>
		<td>
			<? echo $this->Html->link('Voir le document', '/documents/view/'.$e['Document']['id']); ?>
		</td>
		<td><? echo h($e['Document']['name'])?></td>
		<td><? echo h($e['Student']['name'])?></td>
		<td><? echo $this->Date->whattime($e['Document']['issue_date']);?>
		<td><? echo $e['Subject']['name']?></td>
	</tr>
	
	<? endforeach;?>
	</tbody>
	
</table>
<? echo $this->Html->link("Ajouter un document", '/documents/add', array('class' => 'btn', 'id' => 'addDocument'));?>
<br><br>