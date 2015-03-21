
  <?php
      foreach($discussionlist as $message) {
      	?>
      	<div class="discussion-element well">
          <strong class = "red"><? echo $message['Student']['name']; ?> </strong> - <? echo $this->Date->whattime($message['Discussion']['issue_date']); ?>
          <br>
         <p class = 'annonce-discussion-body'><? echo nl2br(h($message['Discussion']['text'])); ?></p>
      	</div>

          <?
      }
  ?>


