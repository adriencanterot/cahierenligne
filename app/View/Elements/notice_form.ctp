

<div class='notice_form'>
	<? echo $this->Form->create('Notice', array('url' => '/notices/add', array('class' => 'form-stacked')));?>
	<h3>Votre Annonce</h3>
	<div class="clearfix">

		<? echo $this->Form->input('text', array('rows' => 3, 'style' => 'width:570px', 'label' => '', 'placeholder' => 'Tapez votre annonce ici'));?>
	</div>	
	<br>
	<div id="submit_notice_container">

<? echo $this->Html->image('spinner.gif', array('class' => 'spinner')); ?>
<? echo $this->Form->submit('Faire l\'annonce', array('class' => 'btn success', 'id' => 'submit_notice'));?>

	</div>

		</form>
	 
</div>