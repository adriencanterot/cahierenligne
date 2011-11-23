<div id="annoncelist">

	<?php
	    foreach($annonces as $message) { ?>
			
			<div class = "notice-element" id="annonce-<? echo $message['Notice']['id']; ?>">

					<div class="notice-head">
						Par <strong class = "red"> <? echo $message['Student']['name'] ?></strong> <?echo $this->Date->whattime($message['Notice']['issue_date'])?>
					</div>

					<p class = "body"> <? echo nl2br(h($message['Notice']['text'])) ?><br><br>
					<a class = "btn" id = 'discussion-<? echo $message['Notice']['id']?>' onclick="showhide('#annonce-discussion-<? echo $message['Notice']['id']; ?>')">Discussions</a>
					</p>

				<div id="annonce-discussion-<? echo $message['Notice']['id']; ?>" class = "annonce-discussion">
				<div id="discussion-liste-<? echo $message['Notice']['id']?>">
					<? echo $this->requestAction('/discussions/liste/compact/2/'.$message['Notice']['id']);?>
				</div>
					<? echo $this->element('AddNoticeDiscussion', array('type' => 2, 'reference' => $message['Notice']['id']));?>
				


				</div>
				</div>

		</div>
				

	<?
	    }
	?>

</div>
