<div class="form_discussion">
<? echo $this->Form->create('Discussion', array(
                                'url' => '/discussions/add', 
                                'class' => 'form-stacked', 
                                'onsubmit' => 'sendnoticediscussion(this);return false;'
                                )); ?>

<div class="clearfix">
<div class="input">
<?
   echo $this->Form->input('text', array(
     'placeholder' => 'Répondre...', 
     'label' => '', 
     'class' => 'discussion_text')
     );
   ?>
</div>
</div>
<div class="clearfix">
  <div class="input">
   <?
        echo $this->Form->input('type_id', array('type' => 'hidden', 'class' => 'input_type_id', 'value' => $type));
        echo $this->Form->input('reference_id', array('type' => 'hidden', 'class' => 'input_reference_id', 'value' => $reference));
         ?>

  </div>
</div>

<div class="clearfix">
  <div class = 'submit_discussion_container'>


  <? echo $this->Html->image('spinner.gif', array('class' => 'spinner')); ?>
  <? echo $this->Form->submit('Répondre', array('class' => 'btn success', 'id' => 'submit_discussion'));

   ?>
   
</div>
<? echo $this->Form->end();?>
</div>
