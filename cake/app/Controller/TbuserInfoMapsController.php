<?php
class TbuserInfoMapsController extends AppController{
	public $name = 'TbuserInfoMaps';
	public $scaffolds;
	
	public function editdata($id = null) {
		$this->TbuserInfoMap->id = $id;
		
		if (!$this->TbuserInfoMap->exists()) {
			throw new NotFoundException('Usuario Incorrecto');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TbuserInfoMap->save($this->request->data)) {
				//$this->TbuserInfoMap->save($this->request->data);
				$this->Session->setFlash('Cambios guardados');
				$this->redirect(array('controller'=>'Users', 'action' => 'view/'.$id));
			} else {
				$this->Session->setFlash('No se guardaron los cambios, intente de nuevo');
			}
		} else {
			$this->request->data = $this->TbuserInfoMap->read();
			
		}
	}
	
	public function data($id = null) {
		$this->TbuserInfoMap->id = $id;
		if (!$this->TbuserInfoMap->exists()) {
			throw new NotFoundException('Usuario incorrecto');
		}
		if (!$id) {
			$this->Session->setFlash('Invalid user');
			$this->redirect(array('controller'=>'Users', 'action' => 'index'));
		}
		$this->set('user', $this->TbuserInfoMap->read());
	}
	
	public function add() {
		
		if ($this->request->is('post')) {
			if ($this->TbuserInfoMap->save($this->request->data)) {
				//$this->Session->setFlash('Usuario registrado correctamente');
				//$this->redirect(array('action' => 'index'));
                                
			} else {
				//$this->Session->setFlash('No se pudo registrar el usuario, intente de nuevo');
			}
		}
	}
	
	

}

	
?>
