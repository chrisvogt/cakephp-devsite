<?php
/**
 * Group model
 *
 * Application group model for
 * CakePHP 2.x.
 *
 * @author chrisvogt <@c1v0>
 */
App::uses('AppModel', 'Model');

/**
 * Group model for Cake.
 *
 * @package     CakePHP-devSite
 * @subpackage  app.Model
 */
class Group extends AppModel {
    
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    
    /**
     * hasMany property
     *
     * @var array
     * http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $hasMany = array('User');
    
}
