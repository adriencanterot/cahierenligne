<? class AppModel extends Model {
	//public $params;
	var $useDbConfig = "beta";
	function now() {
		return date('c');
	}
	function hash($string) {
		return Security::hash($string, 'sha1', true);
	}
}?>