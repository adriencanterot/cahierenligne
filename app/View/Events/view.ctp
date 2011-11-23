<h2>En <? echo $event['Subject']['name']?>, 
<? echo $event['Event']['name']; ?> à rendre <? echo $this->Date->when($event['Event']['due_date']);?></h2>


<h3> Documents utiles </h3>

<table class = 'zebra-striped'>
<thead>
	<tr>
		<th>Devoir</th>
		<th>Élève</th>
		<th>Matière</th>
		<th>Voir</th>
		
	</tr>
</thead>
<tbody>
	<? foreach($related as $e): ?>
	<tr>
		<td><? echo h($e['Document']['name'])?></td>
		<td><? echo $e['Student']['name']?></td>
		<td><? echo $e['Subject']['name']?></td>
		<td>
			<? echo $this->Html->link('Voir les fichiers', '/documents/view/'.$e['Document']['id']); ?>
		</td>
	</tr>
	<? endforeach;?>
</tbody>
	
</table>
</div>
<? echo $this->Html->link("Ajouter un document", '/documents/add')?>

<? echo $this->requestAction('/discussions/liste/complete/1/'.$reference);?>
<? echo $this->element('AddDiscussion', array('type' => 1, 'reference' => $reference));?>

