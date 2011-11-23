<? class ViewerHelper extends AppHelper {
	var $helpers = array('Html');
	
	function listpages($pagelist) {
		$i = 0;
		foreach($pagelist as $block) {
			$i++;
			if(!in_array($this->type($block['DocumentElement']['path']), array('mp3'))) {
			echo "<div class = 'preview'>";

				echo $this->Html->image('icons/'.$this->type($block['DocumentElement']['path']).'.png', 
				array('url' => '/'.$block['DocumentElement']['path']));
			
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page '.$i;
			echo "</div>";
		}
			
		}
		
	}
	function listdocuments($pagelist) {
		echo "<h3>Documents affichés</h3>";
		foreach($pagelist as $block) {
			if(in_array($this->type($block['DocumentElement']['path']), array('png', 'jpg'))) {
				echo "<div>";

				echo $this->Html->image('/'.$block['DocumentElement']['path'], array('url' => '/'.$block['DocumentElement']['path'], 'width' => 650));
			
				echo "</div><br/><hr/><br/>";
			}
			if($this->type($block['DocumentElement']['path']) == 'mp3') {
				echo $this->player($block['DocumentElement']['path']);
			}
			
		}
	}
	
	function type($path) {
		$ext = explode('.', $path);
		$extlist = array('jpg', 'png', 'mp3','avi', 'bmp', 'doc', 'docx', 'dotx', 'mp4', 'mpg', 'odf', 'ods', 'odt', 'otp', 'ots', 'ott', 'pdf', 'ppt', 'rtf', 'tiff', 'txt', 'xls', 'xslx');
		if(!in_array(end($ext), $extlist)) {
			return 'default';
		}
		return end($ext);
	}
	
	function player($path) {
		return '<object type="application/x-shockwave-flash" data="/cahierenligne/flash/dewplayer.swf" width="200" height="20" id="dewplayer" name="dewplayer"> <param name="wmode" value="transparent" /><param name="movie" value="/cahierenligne/flash/dewplayer.swf" /> <param name="flashvars" value="mp3=/cahierenligne/'.$path.'&amp;showtime=1" /> </object>';
	}
	
	function extradocs($pagelist) {
		foreach($pagelist as $block) {
			if(!in_array($this->type($block['DocumentElement']['path']), array('mp3'))) {
				return true;
			}
		}
		return false;
	}
	
	

}?>