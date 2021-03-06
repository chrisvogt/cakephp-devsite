<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
    
    
/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Components this controller uses
 *
 * @var array
 */
	public $components = array('GithubEventsWidget.GithubApi', 'Recaptcha.Recaptcha');

/**
 * beforeFilter
 * 
 */
        public function beforeFilter() {
            $this->Auth->allow();
        }
    
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
                if ($page == 'home') {
                    $this->helpers[] = 'GithubEventsWidget.GithubEvents';
                    $this->loadModel('Project');
                    $this->set('projects', $this->Project->find('all', array('order' => 'Project.created')));
                    $this->set('events', $this->GithubApi->recentEvents(array(
                            'type' => 'users',
                            'target' => Configure::read('social.github') . '/events/public'
                    ), 12));
                    $this->set('description_for_layout', 'Home page for Chris Vogt\'s instance of Devsite, a developer\'s portal and project management suite.');
                }
                if ($page == 'about') {
                    $this->set('description_for_layout', 'More information about me, benchmarking my skills, and my background working with the Web.');
                }
                if ($page == 'contact') {
                    $this->set('description_for_layout', 'Get in touch with me via email or send me a message through my site.');
                }
                
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
        
}
