<div class="page-header"><h2>Liste des devoirs</h2></div>
<p>Voici une liste des devoirs à faire pour cette classe, ainsi que les documents qui peuvent être utiles.</p>
<table class = 'zebra-striped'>
<thead>
	<tr>
		 <th>Voir</th>
		<th>Informations</th>
		<th>Date à rendre</th>
		<th>Etudiant</th>
		<th>Matiere</th>
		
	</tr>
</thead>

<tbody>

	<? foreach($eventlist as $e): ?>
	<tr>
		<td>
			<? echo $this->Html->link('Documents liés', '/events/view/'.$e['Event']['id']); ?>
		</td>
		<td><? echo $e['Event']['name']?></td>
		<td><? echo $this->Date->when($e['Event']['due_date'])?></td>
		<td><? echo $e['Student']['name'] ?></td>
		<td><? echo $e['Subject']['name']?></td>

	</tr>
	<? endforeach;?>
</tbody>

	
</table>
