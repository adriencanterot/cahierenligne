<div class = 'documentlist'>
	<ul>
<? foreach($documentlist as $element): ?>
	<li><h4><? echo $this->Html->link(h($element['Document']['name']), '/documents/view/'.$element['Document']['id'])?> - <? echo $element['Subject']['name']?></h4></li>
<?endforeach;?>
</ul>
</div>