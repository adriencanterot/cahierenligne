<?
class Visit extends AppModel {
	
	var $belongsTo = array("Student", "Classroom");
	
	function add($member) {
		$this->create();
		$this->set('student_id', $member['Student']['id']);
		$this->set('date', $this->now());
		$this->save();
	}
};
?>