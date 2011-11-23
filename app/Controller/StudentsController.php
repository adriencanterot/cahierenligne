<?php
class StudentsController extends AppController {
	var $scaffold = 'admin';
	
	function beforeFilter() {
            $this->allow('login', 'signin');
			$this->Student->params = $this->params;
            parent::beforeFilter();
	}
	
	
	function login() {
		
			$this->loadModel('Visit');
		if(!empty($this->request->data)) {
			$member = $this->Student->validate_login($this->request->data['email'], $this->request->data['password']);
			
			if($member != -1) {
				$this->Session->setFlash('Vous êtes connecté', 'success');
				$this->create_session($member);
				$this->Visit->add($member);
				$this->redirect('/homes');

			} else {
				$this->Session->setFlash("La combinaison email/mot de passe ne marche pas", 'error');
			}
		}
	}
	
	function logout() {
		$this->Session->destroy();
                $this->Session->setFlash("Vous êtes déconnecté.", 'success');
                $this->redirect("/students/login");
	}
	



	function editpassword() {
		
		$this->layout = 'visitors';
		if(!empty($this->request->data)) {
			$this->Student->id = $this->user();
			
			
			if($this->hash($this->request->data['Student']['old_password']) == $this->user('password') AND $this->request->data['Student']['password'] == $this->request->data['Student']['confirm_password'] AND !empty($this->request->data['Student']['password'])) {
				$this->request->data['Student']['password'] = $this->hash($this->request->data['Student']['password']);
				
				$this->request->data['Student']['password_changed'] = true;
				$this->Student->save($this->request->data,array(), array('password'));
				$this->Session->write('current_user.password_changed', 'true');
				$this->notice("Votre mot de passe à été changé", 'success');
				$this->redirect('/homes/');
				
				
			} else {
				$this->notice("Une erreur est survenue, vérifiez que les champs sont remplis sans erreur", 'error');
			}
			
		}
	}
	
	function editinfos() {
		$this->Student->id = $this->user();
		$this->set('student', $this->Student->find('first', array('conditions' => array('Student.id' => $this->user()))));
	}
	
	function subscribe_students() {
		$this->layout = 'visitors';
		if($this->user('student_subscription') == true) {
			if(!empty($this->request->data)) {
				//$studentlist = $this->request->data['Student'];
				// echo count($this->request->data['Student']);
				// array_values($this->request->data['Student']);
				for($i=0;$i<count($this->request->data['Student']);$i++) {
					
					if($this->request->data['Student'][$i]['name'] == '') {
						unset($this->request->data['Student'][$i]);
						
					} else {
						$this->request->data['Student'][$i]['password'] = $this->random_password();
						$this->request->data['Student'][$i]['year'] = $this->user('year_id');
						$this->request->data['Student'][$i]['classroom'] = $this->classroom();	
					}
							
				}
				// echo count($this->request->data['Student']);
				// 
				// echo '<pre>';
				// print_r($this->request->data['Student']);
				// echo '</pre>';
				
				$this->Student->subscribe_all($this->request->data['Student']);
				$this->Student->read(null,$this->user());
				$this->Student->set('student_subscription', false);
				$this->Student->save();
				
				
				$this->set('studentlist', $this->request->data['Student']);
				$this->render('subscription_completed');
			}
			
		} else {
			$this->choose_layout();
			$this->redirect('/homes/index');
		}
	}
}
?>