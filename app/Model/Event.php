<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Event extends AppModel {
    
    var $hasAndBelongsToMany= "Document";
    var $belongsTo = array("Subject", "Student", "Classroom");
    public $hasMany = array(
        'Discussion' => array(
            'className'     => 'Discussion',
            'foreignKey'    => 'reference_id',
            'conditions'    => array('Discussion.type_id' => '1'),
            'dependent'     => true
        )
    );
    
	function beforeSave() {
		if($this->params['action'] != 'edit') {
			$this->data['Event']['issue_date'] = $this->now();
		}
		return true;
	}
}

?>
