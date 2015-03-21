<div id="discussionlist">
<br /><br />
<h3> Discussion </h3>
  <table class = 'table table-striped table-bordered'>
  <?php
      foreach($discussionlist as $message) {
          echo '<tr><td><h4>'.$message['Student']['name'].'</h4><br/></td> <td>'.nl2br(h($message['Discussion']['text'])).'</td></tr>';
      }
  ?>
  </table>
</div>


