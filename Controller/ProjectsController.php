<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 */
class ProjectsController extends AppController {
    
    public $components = array('GithubApi', 'Session');
    
    public $uses = array('Project','ProjectMetum');
    
    var $helpers = array('Markdown.Markdown');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Project->recursive = -1;
                $this->Project->contain('ProjectMetum');
                $projects = $this->paginate(array('Project.is_active' => true, 'Project.is_private' => false));
		$this->set('projects', $projects);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
                $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
                $project = $this->Project->find('first', $options);
                $repoMeta = $this->_processRepoUrls(Set::extract('/ProjectMetum[key=repo][:first]', $project));
                $this->set('events', $this->GithubApi->recentEvents(array('type' => 'repos', 'target' => $repoMeta['repo'] . '/events'), 10));
                $details = $this->GithubApi->repoInfo($repoMeta['repo']);
                $this->set('details', $details);
                $lastCommit = $this->ProjectMetum->find('first', array('conditions' => array('ProjectMetum.project_id' => $id, 'ProjectMetum.key' => 'last_commit')));                
                $this->_trackLastCommit($project, $id, $details, $lastCommit);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$clients = $this->Project->Client->find('list');
		$tags = $this->Project->Tag->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('clients', 'tags', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
		$clients = $this->Project->Client->find('list');
		$tags = $this->Project->Tag->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('clients', 'tags', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('Project deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Project was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$clients = $this->Project->Client->find('list');
		$tags = $this->Project->Tag->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('clients', 'tags', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
		$clients = $this->Project->Client->find('list');
		$tags = $this->Project->Tag->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('clients', 'tags', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('Project deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Project was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
        
/*
 * ------ INTERNAL METHODS & FUNCTIONS ------
 */
        
        private function _processRepoUrls($repo) {
            $repoUrl = Set::classicExtract($repo, '{n}.ProjectMetum.value');            
            if(isset($repoUrl[0])) {
                $strippedUrl = rtrim($repoUrl[0], '.git');
                $urls = array('repo'  => $strippedUrl);
                return $urls;
            } else {
                return false;
            }
        }
        
        private function _trackLastCommit($project, $id, $details, $lastCommit) {
                if (!$lastCommit) {
                    $this->data = array(
                        'id'            => null,
                        'project_id'    => $id,
                        'key'           => 'last_commit',
                        'value'         => $details['pushed_at']
                    );
                    $this->ProjectMetum->save($this->data);
                } elseif ($lastCommit && $lastCommit['ProjectMetum']['value'] != $details['pushed_at']) {
                    $this->ProjectMetum->id = $lastCommit['ProjectMetum']['id'];
                    $this->ProjectMetum->saveField('value', $details['pushed_at']);
                }
                
                $title_for_layout = $project['Project']['name'];
		$this->set(compact('project', 'repo', 'commits', 'title_for_layout'));
        }
        
}
