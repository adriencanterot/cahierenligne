<?php
class HomesController extends AppController {


	function index() {
		$this->loadModel('Document');
		$this->set('lastdocuments', 
		$this->Document->find('all', array('order' => 'issue_date desc', 'conditions' => array('issue_date >=' => date('c', strtotime('-7 days')), 'Document.classroom_id' => $this->classroom()), 'limit' => 5)));
		
		$this->set('lastannonces', $this->Notice->find('all', array('order' => 'issue_date desc', 'limit' => 6, 'conditions' => array('Notice.classroom_id' => $this->classroom()))));
		$this->Discussion->recursive = 2;
		$this->set('lastdiscussions', $this->Discussion->find('all', array('order' => 'Discussion.issue_date desc', 'limit' => 4, 'conditions' => array('Discussion.classroom_id' => $this->classroom()))));
		
		$this->random_password();
		
	}
	
	function admin_panel() {
		
	}
	
	function manage_index() {
		$this->set('classroom', $this->Classroom->find('first', array('conditions' => array('Classroom.id' => $this->classroom()))));
		
		$this->set('studentlist', $this->Student->find('all', array('conditions' => array('Classroom.id' => $this->classroom()))));
	}
}
?>