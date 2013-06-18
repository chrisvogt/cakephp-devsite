<?php
App::uses('AppController', 'Controller');
/**
 * UserMeta Controller
 *
 * @property UserMetum $UserMetum
 */
class UserMetaController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserMetum->recursive = 0;
		$this->set('userMeta', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserMetum->exists($id)) {
			throw new NotFoundException(__('Invalid user metum'));
		}
		$options = array('conditions' => array('UserMetum.' . $this->UserMetum->primaryKey => $id));
		$this->set('userMetum', $this->UserMetum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserMetum->create();
			if ($this->UserMetum->save($this->request->data)) {
				$this->Session->setFlash(__('The user metum has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user metum could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->UserMetum->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserMetum->exists($id)) {
			throw new NotFoundException(__('Invalid user metum'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserMetum->save($this->request->data)) {
				$this->Session->setFlash(__('The user metum has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user metum could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('UserMetum.' . $this->UserMetum->primaryKey => $id));
			$this->request->data = $this->UserMetum->find('first', $options);
		}
		$users = $this->UserMetum->User->find('list');
		$this->set(compact('users'));
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
		$this->UserMetum->id = $id;
		if (!$this->UserMetum->exists()) {
			throw new NotFoundException(__('Invalid user metum'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserMetum->delete()) {
			$this->Session->setFlash(__('User metum deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User metum was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserMetum->recursive = 0;
		$this->set('userMeta', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserMetum->exists($id)) {
			throw new NotFoundException(__('Invalid user metum'));
		}
		$options = array('conditions' => array('UserMetum.' . $this->UserMetum->primaryKey => $id));
		$this->set('userMetum', $this->UserMetum->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserMetum->create();
			if ($this->UserMetum->save($this->request->data)) {
				$this->Session->setFlash(__('The user metum has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user metum could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->UserMetum->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserMetum->exists($id)) {
			throw new NotFoundException(__('Invalid user metum'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserMetum->save($this->request->data)) {
				$this->Session->setFlash(__('The user metum has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user metum could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('UserMetum.' . $this->UserMetum->primaryKey => $id));
			$this->request->data = $this->UserMetum->find('first', $options);
		}
		$users = $this->UserMetum->User->find('list');
		$this->set(compact('users'));
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
		$this->UserMetum->id = $id;
		if (!$this->UserMetum->exists()) {
			throw new NotFoundException(__('Invalid user metum'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserMetum->delete()) {
			$this->Session->setFlash(__('User metum deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User metum was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
