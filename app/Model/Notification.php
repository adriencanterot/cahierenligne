<?php
class Notification extends AppModel {
    function send($to, $action, $description) {
        foreach(array_unique($to) as $student) {
            $this->create();
            $this->set('student_id', $student);
            $this->set('route', $action);
            $this->set('text', $description);
			$this->set('issue_date', $this->now());
            $this->save();
        }
    }

	function viewed($url, $id) {
		
		$idlist = $this->find('list', array('conditions' => array('route' => $url, 'student_id' => $id)));
		if(!empty($idlist)) {
			foreach($idlist as $element) {
				$this->delete($element);
			}
		}
	}
}
?>
