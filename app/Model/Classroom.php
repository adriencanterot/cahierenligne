<? 
class Classroom extends AppModel
{
	var $hasMany = array('Students', 'Documents', 'Discussions', 'Events', 'Notices', 'Visits');
	var $hasAndBelongsToMany = 'Subject';
	var $belongsTo = array('School', 'Year');
}