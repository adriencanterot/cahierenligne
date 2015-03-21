<div class='modal-document'>	

	<div class = "modal-backdrop"></div>
	
	<div class = 'modal'>
		<div class = 'modal-header'>
		<a href='#' class="close">x</a>
			<h2>Ajouter un Document</h2>
			
		</div>

		<div class="modal-body">
		<h3>Remplir le formulaire</h3>
		 	
			<? echo $this->Form->create("Document", array("enctype" => 'multipart/form-data', 
														  'class' => 'form-stacked',
														  'action' => 'add'
														  ));?>
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
					'class' => 'span8',
					'type' => 'textarea'));?>
			</div>
		<h3 id= 'send'>Envoyer le document</h3>
			<div class="clearfix">

			Vous pouvez ici envoyer vos documents qui ne sont pas sous forme de texte.
			<br><br>
<? /*
<!-- Plupload API from this point -->
			<div id="plcontainer">
			    <div id="filelist">No runtime found.</div>
			    <br />
			    <a id="pickfiles" href="javascript:;">[Select files]</a> 
			    <a id="uploadfiles" href="javascript:;">[Upload files]</a>
			</div>


			<script type="text/javascript">
			// Custom example logic
			function $(id) {
				return document.getElementById(id);	
			}


			var uploader = new plupload.Uploader({
				runtimes : 'gears,html5,flash,silverlight,browserplus',
				browse_button : 'pickfiles',
				container: 'plcontainer',
				max_file_size : '10mb',
				url : 'upload.php',
				resize : {width : 320, height : 240, quality : 90},
				flash_swf_url : '../js/plupload.flash.swf',
				silverlight_xap_url : '../js/plupload.silverlight.xap',
				filters : [
					{title : "Image files", extensions : "jpg,gif,png"},
					{title : "Zip files", extensions : "zip"}
				]
			});

			uploader.bind('Init', function(up, params) {
				$('filelist').innerHTML = "<div>Current runtime: " + params.runtime + "</div>";
			});

			uploader.bind('FilesAdded', function(up, files) {
				for (var i in files) {
					$('filelist').innerHTML += '<div id="' + files[i].id + '">' + files[i].name + ' (' + plupload.formatSize(files[i].size) + ') <b></b></div>';
				}
			});

			uploader.bind('UploadProgress', function(up, file) {
				$(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
			});

			$('uploadfiles').onclick = function() {
				uploader.start();
				return false;
			};

			uploader.init();
			</script>

<!-- Plupload API end -->
*/?>
		<div class="modal-footer">
			<a class="btn" id='close'>Fermer</a>
			<? echo $this->Form->submit("Envoyer le document", array('class' => 'btn primary'));?>
			</form>
		</div>
	</div>
</div>
</div>
