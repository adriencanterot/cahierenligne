<div id="eventlist">
	<div class = 'accordion'>
	<? foreach($eventlist as $key => $element): ?>
	    <h4><a href="#"><? echo h($element['Subject']['name']); ?></a></h4>
		<div><ul>
			<li> Pour <? echo $this->Date->when($element['Event']['due_date'])?></li>
			<li><? echo $element['Event']['name']?></li>
			<li><? echo $this->Html->link('Voir les documents', '/events/view/'.$element['Event']['id'])?></li>
			<br/>
			
			</div>
	<?endforeach;?>
	</div>
</div>
