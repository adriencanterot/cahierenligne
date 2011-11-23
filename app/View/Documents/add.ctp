<div class = "page-header">
	<h3>Remplir le formulaire</h3>
</div>
<?
	echo $this->Form->create("Document", array("enctype" => 'multipart/form-data'));
	echo $this->Form->input("subject_id", array('label' => 'Matière'));
	echo $this->Form->input('Event.Event');
	echo $this->Form->input("name", array('label' => 'Titre de votre document'));

	
?>
div.page-header
<h3>Coller un document</h3>
Utilisez le champ ci-dessous pour copier-coller un document Word ou OpenOffice. Si votre document n'est pas un texte, 
<a href= '#send'>envoyez-le !</a>
<? echo $this->Form->input('body', array('label' => 'Collez ici le contenu du document', 'class' => 'richtext'));?>
<? echo $this->Form->input('classroom_id', array('type' => 'hidden'))?>

<h3 id= 'send'>Envoyer le document</h3>
Vous pouvez ici envoyer vos documents qui ne sont pas sous forme de texte.
	<div id="file_field">
	  <div id="filefieldcontent"><input type='file' name='data[Document][file][0]' id='DocumentDocument' /><br/><br/></div>	
	  <a href="" id = 'addfilefield' onClick = "addElement(document.getElementById('filefieldcontent')); return false;" > Ajouter une page</a>
	</div>
<?
	echo $this->Form->end("Envoyer le document");
	
	
?>