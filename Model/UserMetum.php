<?php
/**
 * User Meta model
 *
 * User metadata model for
 * CakePHP 2.x.
 *
 * @author chrisvogt <@c1v0>
 */
App::uses('AppModel', 'Model');

/**
 * User meta model for Cake.
 *
 * @package     CakePHP-devSite
 * @subpackage  app.Model
 */
class UserMetum extends AppModel {
    
    /**
     * belongsTo property
     *
     * @var array
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $belongsTo = array('user');
    
}
