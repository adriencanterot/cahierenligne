<fieldset>
<? echo $this->Form->create('Discussion', array('url' => '/discussions/add', 'class' => 'form-stacked')); ?>

<div class="clearfix">
<div class="input">
<?
   echo $this->Form->input('text', array('style' => 'width:500px', 'label' => ''));
   ?>
</div>
</div>
<div class="clearfix">
  <div class="input">
   <?
        echo $this->Form->input('type_id', array('type' => 'hidden', 'id' => 'input_type_id', 'value' => $type));
        echo $this->Form->input('reference_id', array('type' => 'hidden', 'id' => 'input_reference_id', 'value' => $reference));
         ?>

  </div>
</div>

<div class="clearfix">
  <div class="input">


   
  <? echo $this->Form->submit('Répondre', array('class' => 'btn'));
   ?>
   <? echo $this->Form->end();?>
</fieldset>