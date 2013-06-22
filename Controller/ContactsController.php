<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Contacts Controller
 *
 * @since 0.1.1
 * @property Contact $Contact
 */
class ContactsController extends AppController {
    
    /**
     * Contact controller components
     * 
     * @var array Components to load
     */
    public $components = array('Recaptcha.Recaptcha');
    
    public function beforeFilter() {
        $this->Auth->allow('sendEmail');
    }
    
    /**
     * Send an email using CakeEmail() to the address set in Bootstrap
     * 
     * @since 0.1.1
     */
    function sendEmail() {
        if ($this->request->is('post')) {
            if ($this->Recaptcha->verify()) {
                $this->Contact->set($this->request->data);
                if ($this->Contact->validates()) {
                    $email = new CakeEmail();
                    $email->config('postmark');

                    $email->from(Configure::read('Social.email'));
                    $email->to(Configure::read('Social.email'));
                    $email->subject('New website contact from ' . $this->data['name']);

                    $email->send('From ' . $this->data['email'] . ': ' . $this->data['message']);

                    $this->Session->setFlash('Your message was sent successfully.', 'flash/success');
                    $this->redirect(array('controller' => 'pages', 'action' => 'display', 'contact'));
                } 
            } else {
                $this->Session->setFlash($this->Recaptcha->error, 'flash/error');
                $this->redirect(array('controller' => 'pages', 'action' => 'display', 'contact'));
            }
        }
    }
    
}

?>
