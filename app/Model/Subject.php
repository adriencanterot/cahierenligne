<?
class Subject extends AppModel {
	
	var $hasMany = array("Documents", "Events");
	var $hasAndBelongsToMany = 'Classroom';
};
?>