<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Discussion extends AppModel {
    

    public $belongsTo = array("Document", "Student", "Event", "Classroom");

	function beforeSave() {
		if($this->params['action'] != 'edit') {
			$this->data['Discussion']['issue_date'] = $this->now();
		}
		return true;
	}

}

?>
