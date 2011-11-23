<h2>Document : <? echo $body['Document']['name']?></h2>
<? if($this->Viewer->extradocs($doclist)) {?>
	<div id = 'previews'>
		<h3>Listes des documents</h3>
	<? $this->Viewer->listpages($doclist);?>
</div>
<? }?>
<? echo $this->Viewer->listdocuments($doclist);?>
<? if(!empty($body['Document']['body'])) {?>
<h3>Document principal</h3>

<iframe src = "<? echo $body['Document']['body']?>" width = '100%', height = '500px'></iframe>
<? } ?>

<? echo $this->requestAction('/discussions/liste/complete/0/'.$reference);?>
<? echo $this->element('AddDiscussion', array('type' => 0, 'reference' => $reference));?>
