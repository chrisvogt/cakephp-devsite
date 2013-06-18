<?php
/**
 * User model
 *
 * Application user management model for
 * CakePHP 2.x.
 *
 * @author chrisvogt <@c1v0>
 */
App::uses('AppModel', 'Model');

/**
 * User model for Cake.
 *
 * @package     CakePHP-devSite
 * @subpackage  app.Model
 */
class User extends AppModel {
    
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'email';
    
    /**
     * hasMany property
     *
     * @var array
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $hasMany = array('UserMetum');

    /**
     * belongsTo property
     *
     * @var array
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $belongsTo = array('Client', 'Group');
    
    /**
     * hasAndBelongsToMany property
     *
     * @var array
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $hasAndBelongsToMany = array('Project');
    
}
