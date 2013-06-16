<?php
/**
 * Client model
 *
 * Application client management model for
 * CakePHP 2.x.
 *
 * @author chrisvogt <@c1v0>
 */
App::uses('AppModel', 'Model');

/**
 * Client model for Cake.
 *
 * @package     CakePHP-devSite
 * @subpackage  app.Model
 */
class Client extends AppModel {
    
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    
    /**
     * hasAndBelongsToMany property
     *
     * @var array
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $hasMany = array('Project', 'User');
    
}
