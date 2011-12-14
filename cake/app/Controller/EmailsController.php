<?php 
  
App::uses('CakeEmail', 'Network/Email'); 
  
class EmailsController extends AppController { 
  
	public function _send_email($to, $subject, $view, $layout, $viewVars) { 
		$email = new CakeEmail('gmail'); 
		$email->viewVars($viewVars);  
		$email->template($view, $layout); 
		$email->emailFormat('html'); 
		$email->to($to); 
		$email->subject($subject);
		$email->from('notifications@circunecto.com'); 
		
		$email->send(); 
	}
} 

?>  