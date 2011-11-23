<br/>
<h3>Liste des annonces</h3>

<p>Voici la liste des annonces faites sur le site. Le système des annonces sera mélangé avec un tout nouveau Chat à la rentrée.</p>
<br/>

	<? foreach($noticelist as $e): ?>
		<h4> Par : <? echo h($e['Student']['name'])?></h4><i> le <? echo $this->Date->formatteddate($e['Notice']['issue_date']);?></i>
		<p><? echo h($e['Notice']['text'])?></p>
		<br/>
	<? endforeach;?>
