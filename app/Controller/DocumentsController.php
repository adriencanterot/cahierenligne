<?php
class DocumentsController extends AppController {
	var $scaffold = 'admin';
	function index() {
		$documentlist = $this->Document->find("all", array('order' => 'issue_date desc', 'conditions' => array('Document.classroom_id' => $this->classroom())));
		$this->set('documentlist', $documentlist);
	}
	
	function add() {
		if(!empty($this->record)) {
			$this->record['Document']['student_id'] = $this->user();
			$this->record['Document']['classroom_id'] = $this->classroom();
			if($this->Document->save($this->record)) {
				$this->flash("Votre document a été envoyé, toute la classe peut désormais le voir", '/documents/index');
			}
		}
	
		$this->set("subjects", $this->Document->Subject->find('list'));
        $this->set('events', $this->Event->find('list', array('order' => 'due_date', 'conditions' => array('due_date >=' => $this->now()))));	
	}
	
	function view($id) {
                $doclist =  $this->Document->DocumentElement->find("all", array("conditions" => array('document_id' => $id)));
				$this->set('body', $this->Document->find('first', array('conditions' => array('Document.id' => $id))));
                $this->set('discussion', $this->Discussion->find('all', array('conditions' => array('reference_id' => $id, 'Discussion.classroom_id' => $this->classroom(), 'type_id' => 0))));
		$this->set('doclist', $doclist);
                $this->set('reference', $id);
	}
	
	function showbysubject($id) {

	            $this->set('documentlist', $this->Document->find('all', array(
	                'conditions' => array('subject_id' => $id, 'Document.classroom_id' => $this->classroom())
	            )));
	            $this->render('index');
	        }
        

}
?>