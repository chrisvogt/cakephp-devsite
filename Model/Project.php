<?php
/**
 * Project model
 *
 * Application project management model for
 * CakePHP 2.x.
 *
 * @author chrisvogt <@c1v0>
 */
App::uses('AppModel', 'Model');

/**
 * Project model for Cake.
 *
 * @package     CakePHP-devSite
 * @subpackage  app.Model
 */
class Project extends AppModel {
    
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    
    /**
     * belongsTo property
     *
     * @var array
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $belongsTo = array('Client');
    
    /**
     * hasMany property
     *
     * @var string
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $hasMany = 'ProjectMetum';
    
    /**
     * hasAndBelongsToMany property
     *
     * @var array
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $hasAndBelongsToMany = array('Tag');
}
