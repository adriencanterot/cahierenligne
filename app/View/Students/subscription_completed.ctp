

<div id = 'signup'>
	<h2>Cahier en ligne</h2>
	<h3>Inscription terminée</h3>
	<p>L'inscription des élèves s'est correctement effectuée. La liste suivant contient les mots de passe provisoires des élèves inscrits. Ces identifiants ont été envoyés aux adresses e-mail renseignées et ils ont dû les recevoir. Toutefois, certains élèves n'ont peut-être pas reçu le mot de passe pour des raisons diverses et il vous est demandé de sauvegarder cette liste. Elle vous a aussi été envoyée par e-mail.
		</p><br/ >
<br/ >
<h3>Liste des élèves et mots de passe.
	<table class = 'no-style'>
			<tr>
				<th>Prénom et nom</th>
				<th>Email</th>
				<th>Mot de passe</th>
			</tr>
		<? foreach($studentlist as $student) {
			?>
			<tr>
				<td><? echo $student['name'];?></td>
				<td><? echo $student['email'];?></td>
				<td><? echo $student['password'];?></td>
			</tr>
			<?
		}
?>

</table><br/ >

<div class="center">
	<? echo $this->Html->link('Visiter le site !', '/students/logout', array('class' => 'button'));?>
</div>
</div>