<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of events_controller
 *
 * @author adrien
 */
class EventsController extends AppController {
    //put your code here
    var $scaffold = 'admin';
    
    function index() {
        $this->set('eventlist', $this->Event->find('all', array('order' => 'due_date', 'conditions' => array('due_date >=' => $this->now(), 'Event.classroom_id' => $this->classroom()))));
    }


    
    function add() {
	if(!empty($this->request->data)) {
		$this->request->data['Event']['due_date'] = date('c', $this->format($this->request->data['Event']['due_date']));
		$this->request->data['Document']['classroom_id'] = $this->classroom();
		$this->request->data = $this->sanitize($this->request->data);
		$this->request->data['Event']['student_id'] = $this->user();
		if($this->Event->save($this->request->data)) {
			$this->notice("Devoir posté", 'info');
                        $this->redirect('/homes');
		}
	}
	
    }
    
    function view($id) {
            $event = $this->Document->Event->find('first',array(
                'conditions' => array('Event.id' => $id, 'Event.classroom_id' => $this->classroom())));
            $this->set('event', $event);
            $this->set('related', $this->Document->related($event));
            $this->set('id', $id);


            $this->set('discussion', $this->Discussion->find('all', array('conditions' => array('Discussion.reference_id' => $id, 'Discussion.classroom_id' => $this->classroom(), 'Discussion.type_id' => 1)))); // Document : 0; Event : 1; Notice : 2;

            $this->set('reference', $id);
    }

    function liste() {
        $this->set('eventlist', $this->Event->find('all', array(
            'order' => 'due_date', 
            'conditions' => array('due_date >=' => $this->now())
                )));
        $this->render('liste');
    }

	private function format($date) {
		list($month, $day
			, $year) = explode('/', $date);
		return mktime(date('H'), date('i'), date('s'),$month, $day, $year);
	}
}
?>
