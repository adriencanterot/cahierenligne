<?
class AppController extends Controller {
	var $components = array('Session', 'Email');
		var $helpers = array('Js' => array('Jquery'), 'Session', 'Date', 'Viewer', 'Html', 'Form');
	var $allowance = array();
	var $subscribeprocessactions = array('subscribe_students', 'subscription_completed');

	
 	function beforeFilter() {

		$this->restrict();
		$this->choose_layout();
		$this->loadblocks();
	}
	
	function choose_layout() {

		if(isset($this->params['admin'])) {
			$this->layout = 'admin';
		} 
		else if(!is_null($this->user('id'))) {

			if($this->request->is('ajax')) {
				$this->layout = null;
			} else {
				$this->layout = 'users';
			}
			
		} else {
			$this->layout = 'visitors';
		}
		
	}

		
		function event_form() {
			$this->set('subjects', $this->Subject->find('list'));
			$this->set('documents', $this->Document->find('list'));
		}
		
		function loadblocks() {
				$this->loadModel('Subject');
				$this->loadModel('Document');
				$this->loadModel('Event');
				$this->loadModel('Discussion');
				$this->loadModel('Notification');
				$this->loadModel('Notice');
				$this->loadModel('Classroom');
				$this->loadModel('Student');
				
				//events
				$this->set('eventelement', $this->Event->find('all', array('order' => 'due_date', 'conditions' => array(
					'due_date >=' => $this->now()
				))));
				$this->Notification->viewed('/'.$this->request->url, $this->user());

				$this->set('notifications', $this->Notification->find('all', array('conditions' => array(
					'student_id' => $this->user()
				))));

				$this->set('events', $this->Event->find('list', array('order' => 'due_date', 'conditions' => array(
					'due_date' <= $this->now()))));
				
				//documents
				$this->set('mydocs',
						$mydocs = $this->Document->find('all', array('conditions' =>
							array('student_id' => $this->user()))));
				
				//subjects
				$this->set('subjectlist', $this->Subject->find('list'));
				$this->event_form();
		}
		
	function create_session($member) {
		$this->Session->write('current_user', $member['Student']);
	}

		function user($data = '') {
			if($data == '') {
				return $this->Session->read('current_user.id');
			} else {
				return $this->Session->read('current_user.'.$data);
			}
		}
	
	function restrict() {
		$currentpage = $this->params['action'];
		//Gestion des restriction.
		// 1 : verifie si il s'agit de la premiere inscription d'un eleve
		//		|_ si l'utilisateur recemment inscrit est sur une des pages d'inscription.
		// 2 : sinon si l'espace administateur est demandé
		//		|_ si l'utilisateur a une niveau superieur à 5
		// 3 : sinon si l'utiliateur est dans la session pour accéder à l'espace membre ou si l'action demandée est acceptée par le contrôleur correspondant.
		// |_ verifie si l'utilisateur à changé son mot de passe pour sa première connexion
		
		if(in_array($this->params['action'], $this->allowance))  {
			
			return true;
			
		} else if ($this->Session->read('current_user')) {
			
			if($currentpage == 'logout'){ return; }
			
			if($this->user('password_changed') == false) {
				if($currentpage != 'editpassword') {
						$this->notice('Votre mot de passe doit être changé.', 'error');
						$this->redirect('/students/editpassword');
						return;
				}

			} else if($this->user('student_subscription') == 1) {
				if(!in_array($currentpage, $this->subscribeprocessactions)) {
					$this->redirect('/students/subscribe_students');
					return;
				}
				
				
			} else {
				return true;
			}
		} else {
			
			$this->redirect('/students/login');
			
		}
		
		
	// 	if($this->user('student_subscription') == true) {
	// 		if(!in_array($currentpage, $this->subscribeprocessactions)) {
	// 			$this->redirect('/students/subscribe_students');
	// 			return true;
	// 		}
	// 		
	// 	}
	// 	
	// 	else if(isset($this->params['prefix']) AND $this->params['prefix'] == 'admin') {
	// 		
	// 		
	// 		if($this->user('auth_level') >= 5) {
	// 			return true;
	// 		} else {
	// 			$this->redirect('/homes/index');
	// 			$this->notice("Vous n'êtes pas un administrateur");
	// 		}
	// 		
	// 		
	// 	} else if($this->Session->read('current_user') OR in_array($this->params['action'], $this->allowance)) {
	// 		
	// 		if(!in_array($this->params['action'], $this->allowance) AND $this->user('password_changed') == false AND !in_array($this->params['action'], array('editpassword', 'logout'))) {
	// 			
	// 			$this->notice('Vous devez impérativement changer votre mot de passe');
	// 			$this->redirect('/students/editpassword');
	// 		}
	// 		return true;
	// 		
	// 	} else {
	// 		
	// 		$this->redirect('/students/login');
	// 		$this->Session->setFlash('Vous netes pas connecte');
	// 	}
	// }
	}
	
	function allow() {
		
		foreach(func_get_args() as $action) {
			array_push($this->allowance, $action);
		}
		
	}
		
	function notice($string, $type) {
		if(!$this->request->is('ajax')) {
			$this->Session->setFlash($string, $type);
		}
			
	}
		
		function debug($data)    {         
		$this->set('debug', $data);
		}
	function hash($string) {
		return Security::hash($string, 'sha1', true);
	}
	function now() {
		return date('Y-m-d');
	}
	
	function sanitize($data) {
		return $data;
	}
	function classroom() {
		return $this->user('classroom_id');
	}
	
	function random_password() {
		$random_password_list = file('../defaultpasswordlist.txt');
		return $random_password_list[mt_rand(0, count($random_password_list)-1)];
	
	}

	function error($array) {
		$this->set('debug_content', $array);
	}
}
?>