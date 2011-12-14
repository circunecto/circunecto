<?php

//Import controller
App::import('Controller', 'TbuserInfoMaps');
App::import('Controller', 'Emails');

class UsersController extends AppController {

	public $name = 'Users';
	public $scaffolds;
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add','verification','verification_email','confirm','recoverpwd_request','recoverpwd','recoverpwd_done');
	}
	
	public function isAuthorized($user) {
	    if ($user['role'] == 'admin') {
	        return true;
	    }
	    if (in_array($this->action, array('edit', 'delete'))) {
	        if ($user['id'] != $this->request->params['pass'][0]) {
	            return false;
	        }
	    }
	    return true;
	}
	
	public function login() {
		//this ensures the session be cleaned every time the login page is requested
		$this->Session->destroy();
		$this->set('title_for_layout', 'Login');
		$this->layout="login";
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
				$id = $this->Auth->user('id');
				$role = $this->Auth->user('role');
				if ($this->Auth->user('confirmed') == 1){
					if($role == 'admin'){
						$this->redirect($this->Auth->redirect());   
					} else{
						$this->redirect(array('action'=>"view/$id"));
					}
				} else {
					$this->Session->setFlash('<span class="login-mesg">El usuario existe pero no ha sido verificado.</span><br/><span class="login-mesg-link"><a href="verification_email/'.$this->Auth->user('id').'" class="login-mesg-link" id="login-recover">¿enviar correo de verificaci&oacute;n?</a></span>');
				}
			} else {
				// retrieving the value entered
				$username_input = $_POST['data']['User']['username'];
				
				//conditions to search by username or email
				$conditions_username = array('conditions'=>
					array('username'=>$username_input));
				$conditions_email = array('conditions'=>
					array('email'=>$username_input));
					
				//search by username and email
				$by_username = $this->User->find('first',$conditions_username);
				$by_email = $this->User->find('first',$conditions_email);
				
				//starting validation to identify the right message to display
				if ((!$by_username) and (!$by_email)) {
					$this->Session->setFlash('<span class="login-mesg">¡Lo sentimos!<br/>El usuario no est&aacute; registrado.</span>');
				}else{
					$id = (empty($by_username['User']['id'])) ? $by_email['User']['id'] : $by_username['User']['id'];
					$this->Session->setFlash('<span class="login-mesg">Combinación usuario/contrase&ntilde;a incorrecta. </span><br/><span class="login-mesg-link"><a href="recoverpwd_request/'.$id.'" class="login-mesg-link" id="login-recover">¿te ayudamos a recuperarlo?</a></span>');
				}
			}
	    }
	}
	
	public function logout() {
	    //$this->redirect($this->Auth->logout());
		$this->Session->destroy();
		$this->redirect(array('action'=>'login'));
	}
	
    public function index() {
		$role = $this->Auth->user('role');
		$id = $this->Auth->user('id');
		if($role == 'admin'){
			$this->User->recursive = 1;
			$this->set('users', $this->User->find('all'));
		} else{
			$this->User->recursive = 1;
			$this->set('users', $this->User->find('all', array('conditions'=>array('User.id'=>$id))));
			
		}	
	}
	
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuario incorrecto');
		}
		if (!$id) {
			$this->Session->setFlash('Invalid user');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read());
	}

	public function add() {
		$this->layout="user_register";
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->User->TbuserInfoMap->saveField('user_id', $this->User->id);
				$this->Session->setFlash('Usuario registrado correctamente');
				$this->redirect(array('action'=>'verification/'.$this->User->id));
			} else {
				$this->Session->setFlash('No se pudo registrar el usuario, intente de nuevo');
			}
		}
	}

	public function edit($id = null) {
		$this->User->id = $id;
		
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuario Incorrecto');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				$this->redirect(array('action' => 'view/'.$id));
			} else {
				$this->Session->setFlash('No se guardaron los cambios, intente de nuevo');
			}
		} else {
			$this->request->data = $this->User->read();
			
		}
	}

	public function delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if (!$id) {
			$this->Session->setFlash('Id invalido');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash('Usuario eliminado');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('No se pudo eliminar el usuario');
		$this->redirect(array('action' => 'index'));
	} 
	
	
	public function verification($id = null) {
		$this->layout="user_register";
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuario Incorrecto');
		}else{
			/*Retrieving the email*/
			$this->User->read();
			$email = $this->User->data['User']['email'];
			if(empty($email)){
				throw new NotFoundException('Usuario con correo electrónico vacío');
			}else{
				
				/*Retrieving user Info*/
				//debug($this->User->data['User']);
				$name = $this->User->data['User']['name'];
				$last_name = $this->User->data['User']['last_name'];
				$middle_name = $this->User->data['User']['middle_name'];
				$username = $this->User->data['User']['username'];
				$password = $this->User->data['User']['password'];
				
				/*Sending Email = Begin*/
				$sendEmail = new EmailsController;
				$sendEmail->constructClasses();
				
				$sendEmail->_send_email( 
					$email, //destination address
					'Bienvenido a Circunecto - Verificación de cuenta', //subject
					'add_user_verification_view',  //My view file
				    'circunecto_basic', // My layout  
				    array(
				    	'id'=>$id
				    	,'name'=>$name
				    	,'last_name'=>$last_name
				    	,'middle_name'=>$middle_name
						,'username'=>$username
						,'password'=>$password) // vars
				);
				
			}
		}
	} // function verification
	
	public function verification_email($id = null) {
		$this->layout="user_register";
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuario Incorrecto');
		}else{
			/*Retrieving the email*/
			$this->User->read();
			$email = $this->User->data['User']['email'];
			if(empty($email)){
				throw new NotFoundException('Usuario con correo electrónico vacío');
			}else{
				
				/*Retrieving user Info*/
				$name = $this->User->data['User']['name'];
				$last_name = $this->User->data['User']['last_name'];
				$middle_name = $this->User->data['User']['middle_name'];
				$username = $this->User->data['User']['username'];
				$password = $this->User->data['User']['password'];
				
				/*Sending Email = Begin*/
				$sendEmail = new EmailsController;
				$sendEmail->constructClasses();
				
				$sendEmail->_send_email( 
					$email, //destination address
					'Circunecto - Verificación de cuenta', //subject
					'add_user_verification_view',  //My view file
				    'circunecto_basic', // My layout  
				    array(
				    	'id'=>$id
				    	,'name'=>$name
				    	,'last_name'=>$last_name
				    	,'middle_name'=>$middle_name
						,'username'=>$username
						,'password'=>$password) // vars
				);
				
			}
		}
	} // function verification_email
	
	public function confirm($key, $id){
		$this->layout="user_confirm";
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuario Incorrecto');
		}else{
			$this->set('user', $this->User->read());
			$password = $this->User->data['User']['password'];
			if(empty($password)){
				throw new NotFoundException('Usuario sin clave de validez');
			}else{
				if(($id == $this->User->data['User']['id']) and ($key == $password)){
					$this->User->saveField('confirmed','1');
				}else{
					throw new NotFoundException('Usuario sin clave de validez');
				}
			}
		}
	} // function confirm

	public function recoverpwd_request($id = null) {
		$this->layout="user_register";
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuario Incorrecto');
		}else{
			/*Retrieving the email*/
			$this->User->read();
			$email = $this->User->data['User']['email'];
			if(empty($email)){
				throw new NotFoundException('Usuario con correo electrónico vacío');
			}else{
				
				/*Retrieving user Info*/
				$name = $this->User->data['User']['name'];
				$last_name = $this->User->data['User']['last_name'];
				$middle_name = $this->User->data['User']['middle_name'];
				$username = $this->User->data['User']['username'];
				$password = $this->User->data['User']['password'];
				
				/*Sending Email = Begin*/
				$sendEmail = new EmailsController;
				$sendEmail->constructClasses();
				
				$sendEmail->_send_email( 
					$email, //destination address
					'Circunecto - Recuperación de Contraseña', //subject
					'recoverpwd_request_view',  //My view file
				    'circunecto_basic', // My layout  
				    array(
				    	'id'=>$id
				    	,'name'=>$name
				    	,'last_name'=>$last_name
				    	,'middle_name'=>$middle_name
						,'username'=>$username
						,'password'=>$password) // vars
				);
			}
		}
	} // function recoverpwd_request
	
	public function recoverpwd($key, $id){
		$this->layout="user_confirm";
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuario Incorrecto');
		}else{
			$this->set('user', $this->User->read());
			$password = $this->User->data['User']['password'];
			if(empty($password)){
				throw new NotFoundException('¡Código de validación expirado!. Si ingresaste de un link, este ha sido expirado');
			}else{
				if(($id == $this->User->data['User']['id']) and ($key == $password)){
					
					//if the form is submitted
					if ($this->request->is('post')) {
						$password_new = $_POST['data']['Recover']['password_new'];
						$password_confirm = $_POST['data']['Recover']['password_confirm'];
						if(!empty($password_new)){
							if ($password_new != $password_confirm){
								$this->Session->setFlash('La contraseña y su confirmación no coinciden');
							}else{
								//update user with new password
								$this->User->saveField('password',$password_new);
								//redirecting the user
								$this->redirect(array('action'=>'recoverpwd_done'));
							}
						}else{
							$this->Session->setFlash('Debes de ingresar la nueva contraseña y su confirmación');
						}
						
					}
				}else{
					throw new NotFoundException('¡Código de validación expirado!. Si ingresaste de un link, este ha sido expirado');
				}
			}
		}
	} // function recoverpwd

	public function recoverpwd_done(){
		$this->layout="user_confirm";
		
	}
	
}
?>
