<?
class Document extends AppModel {
	
	public $belongsTo = array("Subject", "Student", "Classroom");
    public $hasAndBelongsToMany = "Event";
	public $hasMany = array(
        'Discussion' => array(
            'className'     => 'Discussion',
            'foreignKey'    => 'reference_id',
            'conditions'    => array('Discussion.type_id' => '0'),
            'dependent'     => true
        ),
        'DocumentElement'
    );
	public $bodycontent = '';
	
	public function beforeSave() {
		if($this->params['action'] != 'edit') {
			$this->data['Document']['issue_date'] = $this->now();
			$this->bodycontent = $this->record['Document']['body'];
			if(!empty($this->bodycontent)) { 
				$this->data['Document']['body'] = true;
			} else {
				$this->data['Document']['body'] = false;
			}
		}
		return true;
	}
	
	public function aftersave() {
		if(!empty($this->data['Document']['file'])) {
			$i = 0;
			$foldername = $this->getfoldername();
			mkdir(WWW_ROOT.'stockage/'.$foldername);
			if(!empty($this->bodycontent)) {
				$handle = fopen(WWW_ROOT.'stockage/'.$foldername.'/bodycontent.html', 'a+');
				fwrite($handle, $this->bodycontent);
				fclose($handle);
			}
			
			if($this->data['Document']['file'][0]['name'] == '') { return true;}
			$o = 0;
			foreach($this->data['Document']['file'] as $file) {
				
				$fileinfo = pathinfo($file['name']);
				$filename = $o.'.'.$fileinfo['extension'];
				$success = move_uploaded_file($file['tmp_name'], WWW_ROOT.'stockage/'.$foldername.'/'.$filename);
				
				$this->DocumentElement->create();
				$this->DocumentElement->set('document_id', $this->id);
				$this->DocumentElement->set('path', 'stockage/'.$foldername.'/'.$filename);
				$this->DocumentElement->set('type', $file['type']);
				$this->DocumentElement->set('page_number', $o);
				$this->DocumentElement->save();
				$o++;
				
			}	
			
		}
		
		return true;
	}
        
        public function related($event) { //deprecated
            $this->recursive = 0;
            $related = array();
            foreach($event['Document'] as $e) {
                $related[] = $this->find('first', array('conditions' => array('Document.id' => $e['id'])));
            }
            return $related;
        }
		
		public function getfoldername() {
			$i = 0;
			while(is_dir(WWW_ROOT.'stockage/'.$i)) { $i++; }
			return $i;
		}
};
?>