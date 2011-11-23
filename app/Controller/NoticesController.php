<? class NoticesController extends AppController {
	var $scaffold = 'admin';
	function add() {

		if(!empty($this->request->data)) {
			$this->request->data = $this->sanitize($this->request->data);
			$this->request->data['Notice']['student_id'] = $this->user();
			$this->request->data['Document']['classroom_id'] = $this->classroom();
			if($this->Notice->save($this->request->data)) {
				$this->notice("Votre annonce a été publiée", 'success');
			}
			$this->redirect($this->referer());
			
		}
	}
	function index() {
		$this->set('noticelist', $this->Notice->find('all', array('order' => 'issue_date desc', 'conditions' => array('Notice.classroom_id' => $this->classroom()))));
	}

	function liste() {
		$this->set('annonces', $this->Notice->find('all', array('order' => 'Notice.id desc', 'limit' => 8)));
		$this->render('liste');
	}
}?>