<h3>Gestion de la classe de <? echo $classroom['Classroom']['name'];?></h3>

<table>
	<tr>
		 <th>Nom et prénom</th>
		<th>E-mail</th>
		<th>Abus par cet étudiant</th>
		
	</tr>
	<? foreach($studentlist as $e): ?>
	<tr>

		<td><? echo $e['Student']['name']?></td>
		<td><? echo $e['Student']['email'] ?></td>
		<td><? echo $this->Html->link('Reporter', '/homes/abuses');?> | 
			<? echo $this->Html->link('Modifier', '/manage/students/edit/'.$e['Student']['id'])?></td>

	</tr>
	<? endforeach;?>
	
</table>
