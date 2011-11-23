<h3>Statistiques</h3>
<table>
	<tr>
		 <th>Nom</th>
		<th>Nombre de visites</th>
		<th>Dernière visite</th>
		<th>Nombre de Documents</th>
		<th>Nombre de Discussions</th>
		<th>Nombre de devoirs</th>
		
	</tr>
	<? foreach($statistics as $e): ?>
	<tr>
		<td>
			<? echo $e['name'] ?>
		</td>
		<td><? echo $e['NoV'];?></td>
		<td><? echo $this->Date->whattime($e['LastVisit'])?></td>
		<td><? echo $e['NoDo']?></td>
		<td><? echo $e['NoDi']?></td>
		<td><? echo $e['NoE']?></td>
	</tr>
	<? endforeach;?>
	
</table>