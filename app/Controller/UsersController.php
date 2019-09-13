<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
  public $components = array(
        'RequestHandler'
    );
 /**
 * Displays a view
 *
 * @return CakeResponse|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	public function index() {

	   if ($this->request->is('post')) {
         
         $userInfo = $this->User->find('first',
                                             array(
                                                   'conditions' => 
                                                                   array(
                                                                   	     'User.name'     => $this->request->data['User']['name'],
                                                                   	     'User.password' => $this->request->data['User']['password'],
                                                                   )
                                             )
                                      );

         if(!empty($userInfo))
         {
         	$this->Session->write('User.userId', $userInfo['User']['id']);
          $this->Session->write('User.userName', $this->request->data['User']['name']);

          if($userInfo['User']['role']=="hr") {
            return $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
          }
          else if($userInfo['User']['role']=="manager")
          {
             return $this->redirect(array('controller' => 'users', 'action' => 'managerdashboard'));
          }  
          else
          {
            return $this->redirect(array('controller' => 'users', 'action' => 'studentdashboard'));
          }  
            
         }	
         else
         {
          $this->Session->setFlash("Invalid username and password");
         } 
	   }
	}

	public function logout() {
       $this->Session->destroy();
       $this->Session->delete('User.userId');
       $this->Session->setFlash('You successfully logged out.');
    }  

	public function dashboard() {
      $this->loadModel('Student');
	    $studentInfo = $this->Student->find('all');
      
      $managerInfo = $this->User->find('all',
                                             array(
                                                   'conditions' => 
                                                                   array(
                                                                         'User.role'     => 'manager',
                                                                   )
                                             )
                                      );
      $this->set(compact('studentInfo','managerInfo'));
	}

  public function assignmanager()
  {
    
    $this->loadModel('Student');
    if ($this->request->is('post')) {
       $this->Student->id = $this->request->data['Student']['id'];
       $this->Student->saveField("manager",$this->request->data['Student']['manager']);
       $this->Session->setFlash("Manager assigned sucessfully....");
    }  

  }

  public function managerdashboard() {
      $this->loadModel('Student');
      $studentInfo = $this->Student->find('all',
                                             array(
                                                   'conditions' => 
                                                                   array(
                                                                         'Student.manager'     => 'abc',
                                                                   )
                                             )
                                         );
      $this->set(compact('studentInfo'));
  }    

  public function studentdashboard() {
      $this->loadModel('Student');
      $usrid=$this->Session->read('User.userId');
      $studentInfo = $this->Student->find('first',
                                             array(
                                                   'conditions' => 
                                                                   array(
                                                                         'Student.userid'     => $usrid,
                                                                   )
                                             )
                                        );
      $this->set(compact('studentInfo'));
  }    

  public function scheduleinterview()
  {
    $this->loadModel('Student');
    if ($this->request->is('post')) {
       $this->Student->id = $this->request->data['Student']['id'];
       $this->Student->saveAll($this->request->data['Student']);
       $this->Session->setFlash("Interview scheduled sucessfully....");
    }  
  }
}
