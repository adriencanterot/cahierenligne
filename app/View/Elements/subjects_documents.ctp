<ul id = "listematiere">
<? foreach($subjectlist as $id => $subject): ?>
    <li class = "matiere" id = "matiere-<? echo $id;?>" >
    <? echo $this->Html->link($subject, '/documents/showbysubject/'.$id, array('class' => 'ajax-subjects')); ?>
    </li>
<?endforeach;?>
</ul>