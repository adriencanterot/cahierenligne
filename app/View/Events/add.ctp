<h4>Ajouter un devoir pour la classe</h4>
<?  echo $this->Form->create('Event', array('action' => 'add'));
    echo $this->Form->input('name');
        echo $this->Form->input('description'); 

    echo $this->Form->input('due_date', array('type' => 'date'));
    echo $this->Form->input('subject_id');
    echo $form->input('Document.Document',array('multiple' => 'checkbox'));

    echo $this->Form->end("Ajouter");
    ?>

