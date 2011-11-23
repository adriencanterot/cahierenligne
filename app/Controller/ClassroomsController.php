<? 
class ClassroomsController extends AppController
{
	var $scaffold = 'admin';
	
	function beforeFilter() {
		$this->allow("signup");
		parent::beforeFilter();
	}
	
	function signup() {
		if(!empty($this->record)) {
			$this->Email->smtpOptions = array(
				'port' => 465,
				'timeout' => 30,
				'host' => 'ssl://smtp.gmail.com',
				'username' => 'adrien.canterot@gmail.com',
				'password' => '$foobar=1994;'
			);
			$this->Email->delivery = 'smtp';
			
			$this->Email->from = $this->record['Classroom']['name'].' <'.$this->record['Classroom']['e-mail'].'>';
			$this->Email->to = 'adrien.canterot@gmail.com';
			$this->Email->subject = "Demande d'inscription au Cahier en ligne";
			$this->Email->send('hellomoto');
			//$this->set('smtp_errors', $this->Email->smtpError);
		}
	}
} ?>