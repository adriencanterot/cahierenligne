<table class = "zebra-striped" id="annonces">
<tbody>

<?php
    foreach($annonces as $message) { ?>
	
        <tr>
			<td style="min-width:200px">
				<strong> <? echo $message['Student']['name'] ?></strong>
			<br/><?echo $this->Date->whattime($message['Notice']['issue_date'])?>
			<a id = 'discussion-<? echo $message['Notice']['id']?>'>Discussions</a>
			
			
			</td>
			<td> 
				<? echo nl2br(h($message['Notice']['text'])) ?>
			</td>
		</tr>
<?
    }
?>
</tbody>
</table>
