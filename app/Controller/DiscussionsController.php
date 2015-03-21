<?php
class DiscussionsController extends AppController {
	
	var $scaffold = 'admin';

	function add() {
            if(!empty($this->request->data['Discussion']['text'])) {
		$this->request->data = $this->sanitize($this->request->data);
                $this->request->data['Discussion']['student_id'] = $this->user();
                $this->request->data['Discussion']['classroom_id'] = $this->classroom();
                
                $this->Discussion->save($this->request->data);
                $this->notice('Message posté', 'info');

                $studentlist = array();

                switch ($this->request->data['Discussion']['type_id']) {
                	case 0:
                		$metamodel = 'document';
                                $model = $this->Document;
                                $notification_url = '/documents/view/'.$this->request->data['Discussion']['reference_id'];
                		break;
                	
                	case 1:
                		$metamodel = 'event';
                                $model = $this->Event;
                                $notification_url = '/events/view/'.$this->request->data['Discussion']['reference_id'];

                                break;

                        case 2:
                                $metamodel = 'notice';
                                $notification_url = '/notices/view/'.$this->request->data['Discussion']['reference_id'];

                                $model = $this->Notice;
                                break;

                }

      	        $owner = $model->find('first', array('conditions' => 
						array(ucfirst($metamodel).'.id' => $this->request->data['Discussion']['reference_id']), 'fields' => array('student_id')));

				$studentlist[] = $owner[ucfirst($metamodel)]['student_id'];
                
				$studentlist = array_merge($this->Discussion->find('list', array('conditions' => array(
						'reference_id' => $this->request->data['Discussion']['reference_id'],
	                	'type_id' => $this->request->Data['Discussion']['type_id']),
	                	'NOT' => array('student_id' => $this->user()),

                        'fields' => array('student_id'))), $studentlist);

                foreach($studentlist as $id => $student) {
                        if($student == $this->user()) {
                                unset($studentlist[$id]);
                        }
                }

					
                $this->Notification->send($studentlist, $notification_url, $this->user('name').' a répondu.');

                $this->redirect($this->referer());
                
            }
        }

        function liste($view, $type, $reference) {
                $this->set('discussionlist', 
                $this->Discussion->find('all', 
                array(
                        'conditions' => array(
                                'type_id' => $type,
                                'reference_id' => $reference
                        ),
                        'recursive' => 0
                        )));

                $this->set('reference', $reference);
                $this->set('type', $type);
                
                switch($view) {
                        case 'compact':
                        $this->render('compactlist');
                        break;

                        case 'complete':
                        $this->render('completelist');
                        break;

                        default:
                        $this->render('completelist');
                }
        }
}
?>