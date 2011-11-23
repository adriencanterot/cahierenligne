<? class VisitsController extends AppController {
	var $scaffold = 'admin';
	
	function admin_index() {
		$this->loadModel('Student');
		$this->loadModel('Document');
		$this->loadModel('Discussion');
		$this->loadModel('Event');
		$students = $this->Student->find('all');
		$tab = array();
		foreach($students as $student) {
			
			$count = $this->Visit->find('count', array('conditions' => array('student_id' => $student['Student']['id'])));
			$lastvisit = $this->Visit->find('first', array('order' => 'date desc', 'conditions' => array('student_id' => $student['Student']['id'])));
			$nbevents = $this->Event->find('count', array('conditions' => array('student_id' => $student['Student']['id'])));
			$nbdocs = $this->Document->find('count', array('conditions' => array('student_id' => $student['Student']['id'])));
			$nbdisc = $this->Discussion->find('count', array('conditions' => array('Discussion.student_id' => $student['Student']['id'])));
			
			$tab[] = array(
				'name' => $student['Student']['name'], 
				'NoV' => $count, 
				'LastVisit' => $lastvisit['Visit']['date'], 
				'NoE' => $nbevents, 
				'NoDo' => $nbdocs,
				'NoDi' => $nbdisc);
		}
		
		$this->set('statistics', $tab);
		
	}
}?>