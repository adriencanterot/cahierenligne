
<br /><br />
<h3> Discussion </h3>
<table class = 'zebra-striped'>
<?php
    foreach($discussion as $message) {
        echo '<tr><td><h4>'.$message['Student']['name'].'</h4><br/></td> <td>'.nl2br(h($message['Discussion']['text'])).'</td></tr>';
    }
?>
</table>


<? echo $this->Form->create('Discussion', array('url' => '/discussions/add', 'class' => 'form-stacked')); ?>
<fieldset>
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
   if(isset($event_id)) {
        echo $this->Form->input('event_id', array('type' => 'hidden', 'value' => $event_id));
   } ?>

  </div>
</div>

<div class="clearfix">
  <div class="input">

   <?if(isset($document_id)) {
        echo $this->Form->input('document_id', array('type' => 'hidden', 'value' => $document_id));
   }?>
  </div>
</div> 

   
  <? echo $this->Form->submit('Répondre', array('class' => 'btn'));
   ?>

</fieldset>




