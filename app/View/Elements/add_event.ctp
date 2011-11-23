<div id="homeworks">
<? echo $this->Html->image('spinner.gif', array('class' => 'spinner')); ?>
<a class = 'btn success' onclick="showhide('.event_form')">Mettre les devoirs</a>
</div>

<div class = 'event_form'>
<fieldset>
<?  echo $this->Form->create('Event', array('action' => 'add', 'class' => 'form-stacked')); ?>
<div class="clearfix">
	<?	echo $this->Form->input('subject_id', array('label' => 'Matière', 'div' => 'input'));?>
</div>

<?  echo $this->Form->input('name', array('label' => 'Titre', 'div' => 'input', 'class' => 'span3'));?>
<?  echo $this->Form->input('due_date', array('class' =>'datepicker', 'type' => 'text', 'label' => 'Pour la date', 'div' => 'input'));?>
<?  echo $this->Form->input('Document.Document', array('label' => 'Documents liés', 'div' => 'input'));?>
<span class="help-block">Appuyez sur Cmd sur Mac ou Ctrl sur windows en cliquant afin de séléctionner plusieurs documents</span>

 <? echo $this->Form->submit("Ajouter", array('class' => 'btn primary'));?>
    
</fieldset>

</div>

