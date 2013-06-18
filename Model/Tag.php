<?php
/**
 * Tag model
 *
 * Application tag (category) model for
 * CakePHP 2.x.
 *
 * @author chrisvogt <@c1v0>
 */
App::uses('AppModel', 'Model');

/**
 * Tag tree model for Cake.
 *
 * @package     CakePHP-devSite
 * @subpackage  app.Model
 */
class Tag extends AppModel {
    
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    
    /**
     * Behaviors
     *
     * @var string
     * @link http://book.cakephp.org/2.0/en/core-libraries/behaviors/tree.html
     */
    public $actsAs = array('Tree' => array('parent' => 'parent_id'));
    
    /**
     * hasAndBelongsToMany
     *
     * @var mixed (array|string)
     * @link http://book.cakephp.org/2.0/en/core-libraries/behaviors/tree.html
     */
    public $hasAndBelongsToMany = array('Project');    
    
}
