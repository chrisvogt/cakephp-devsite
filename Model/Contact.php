<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 */
class Contact extends AppModel {
  
    public $useTable = false;
    
    public $_schema = array(
        'name'      => array('type' => 'string', 'length' => 150),
        'email'     => array('type' => 'string', 'length' => 150),
        'message'   => array('type' => 'text')
    );
    
    public $validate = array(
        'name'      => array(
            'rule'      => array('minLength', 1),
            'message'   => 'Name is required.' ),
        'email'     => array(
            'rule'      => 'email',
            'message'   => 'Must be a valid email address.' ),
        'details'   => array(
            'rule'      => array('minLength', 1),
            'message'   => 'A message body is required.' )
    );
    
}

?>