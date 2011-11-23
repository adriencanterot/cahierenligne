
<div id = 'signup'>
	<h2>Inscription des élèves</h2>
	<p>Vous devez maintenant inscrire les élèves de votre classe en remplissant le champ e-mail et mot de passe de chacuns des élèves, vous pouvez trouver les e-mails sur leur compte facebook ou les récolter en classe.
		</p><br/ >
<br/ >
<h3>Remplir le formulaire</h3>
<? echo $this->Form->create(array('action' => 'subscribe_students'));?>
<? for($i=0;$i<15;$i++) { ?>
	<div id="Form<?echo $i?>">
		
	
	<h4><? echo 'Élève '.($i+1);?></h4>
	Prénom et Nom<input name='data[Student][<? echo $i;?>][name]' type='text' maxlength='255' id='Student<?echo $i?>Name'/>

Email : <input name='data[Student][<? echo $i;?>][email]' type='text' maxlength='255' id='Student<?echo $i?>Email' />	
<br/ >
<br/ >
</div>

<?
}  ?>
<script type = "text/javascript">
compteur = 0;
function newStudentForm(){
	$('#Form'+(15+compteur-1)).after("<div id='Form"+(15+compteur)+"'><h4>Élève "+(16+compteur)+"</h4>Prénom et Nom<input name='data[Student]["+(15+compteur)+"][name]' type='text' maxlength='255' id='Student"+(15+compteur)+"Name'/>Email : <input name='data[Student]["+(15+compteur)+"][email]' type='text' maxlength='255' id='Student"+(15+compteur)+"Email' />	<br/ ><br/ ></div>");
	compteur++;

}
	</script>
<a href='#' onclick="newStudentForm();return false;">Ajouter un élève</a>
<?
echo $this->Form->submit("Inscrire les élèves");
?>
</div>