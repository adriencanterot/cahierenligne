<div class='modal-document'>	

	<div class = "modal-backdrop"></div>
	
	<div class = 'modal'>
		<div class = 'modal-header'>
		<a href='#' class="close">x</a>
			<h2>Ajouter un Document</h2>
			
		</div>

		<div class="modal-body">
		<h3>Remplir le formulaire</h3>
		 	
			<? echo $this->Form->create("Document", array("enctype" => 'multipart/form-data', 'class' => 'form-stacked'));?>
			<div class="clearfix">
				<? echo $this->Form->input("subject_id", array('label' => 'Matière', 'class' => 'span8'));?>
			</div>
			
			<div class="clearfix">
				<? echo $this->Form->input('Event.Event', array('class' => 'span8'));?>
			</div>
			
			<div class="clearfix">
				<? echo $this->Form->input("name", array('label' => 'Titre de votre document', 'class' => 'span8'));?>
			</div>

			<h3>Coller un document</h3>
			<div class="clearfix">
				<? echo $this->Form->input('body', array(
					'label' => 'Collez ici le contenu du document', 
					'class' => 'richtext', 
					'placeholder' => "Utilisez le champ ci-dessous pour copier-coller un document Word ou OpenOffice. Si votre document n'est pas un texte",
					'class' => 'span8'));?>
			</div>
		<h3 id= 'send'>Envoyer le document</h3>
			<div class="clearfix">

			Vous pouvez ici envoyer vos documents qui ne sont pas sous forme de texte.
			<br><br>
			<div id="file_field">
			  <div id="filefieldcontent"><input type='file' name='data[Document][file][0]' id='DocumentDocument' class = 'span8'/><br/><br/></div>	
			  <a href="" id = 'addfilefield' onClick = "addElement(document.getElementById('filefieldcontent')); return false;" > Ajouter une page</a>
			</div>
			</div>
		</div>

		<div class="modal-footer">
			<a class="btn" id='close'>Fermer</a>
			<? echo $this->Form->submit("Envoyer le document", array('class' => 'btn primary'));?>
			</form>
		</div>
	</div>
</div>
