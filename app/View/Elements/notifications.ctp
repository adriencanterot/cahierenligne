<? if (count($notifications) != 0){ ?><h3> Notifications (<? echo count($notifications);?>)</h3>
<? foreach($notifications as $element) {
    echo $this->Html->link($element['Notification']['text'], $element['Notification']['route']).'<br/ >';
}
}else{ ?>
<h3>Notifications</h3>
<p>Vous n'avez aucune notifications pour le moment.</p>
<? } ?>