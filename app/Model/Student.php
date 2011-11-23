<?
class Student extends AppModel {
	var $params;
	var $hasMany = array("Documents", "Events", "Discussions", "Visits");
	var $belongsTo = array('Classroom', 'Year', 'School');
        /*var $validate = array(
            'email' => array(
                'email' => array(
                    'rule' => 'email',
                    'message' => "Ceci n'est pas un e-mail valide"
                ),
                'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'Un eleve est deja enregistre sous cet e-mail'
                ),
                'is_identical' => array(
                    'rule' => array('is_identical', 'confirm_email'),
                    'message' => 'Les deux e-mails entres ne sont pas identiques'
                    )
                ),
            
            'password' => array(
                'is_identical' => array(
                    'rule'=> array('is_identical', 'confirm_password'),
                    'message' => "Veuillez reentrer votre mot de passe"
                    ),
			),
            'year' => 'notEmpty',
            'name' => 'notEmpty'

            );*/
        
        function beforeSave($options = array()) {
            parent::beforeSave($options);
			// print_r($this->params);
			// echo $this->params['action'];
			if($this->params['action'] == 'add') {
				$this->data['Student']['password'] = $this->hash($this->data['Student']['password']);
				//$this->record['Student']['signup_date'] = $this->now();
				
	            
			}
            return true;
        }
	function subscribe_all($all) {
		foreach($all as $student) {
			$this->create();
			$this->set('classroom_id', $student['classroom']);
			$this->set('auth_level', 1);
			$this->set('student_subscription', false);
			$this->set('password_changed', false);
			$this->set('email', $student['email']);
			$this->set('student_subscription', false);
			$this->set('password', $this->hash($student['password']));
			$this->set('name', $student['name']);
			$this->set('year_id', $student['year']);
			$this->set('signup_date', $this->now());
			$this->save();
			
		}
	}
	function validate_login($member, $password) {

		if($member = $this->find('first', array('conditions' =>array('email' => $member, 
                    'password' => $this->hash($password))))) {
        $member['Student']['classroom'] = $this->Classroom->find('first', array(
            'conditions' => array(
                        'Classroom.id' => $member['Student']['classroom_id'])));
        $member['Student']['school'] = $this->School->find('first', array(
            'conditions' => array(
                        'School.id' => $member['Student']['school_id'])));

            
			return $member;
		} else {
			return -1;
		}
	}

        function is_identical( $field=array(), $compare_field=null ) {
            foreach( $field as $key => $value ){
                $v1 = $value;
                $v2 = $this->record[$this->name][ $compare_field ];
                if($v1 !== $v2) {
                    return FALSE;
                } else {
                    continue;
                }
            }
        return TRUE;
    } 
};
?>