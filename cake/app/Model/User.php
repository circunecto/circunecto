<?php
class User extends AppModel {
	public $name = 'User';
	public $displayField = 'name';
	public $hasOne = array(
					'TbuserInfoMap'=>array(
											'className'=>'TbuserInfoMap',
											'foreingKey'=>'user_id',
											'dependent'=>true
											)
	);
	
	public $validate = array(
		'name'=>array(
			'Please enter your name.'=>array(
				'rule'=>'notEmpty',
				'message'=>'Ingresa tu Nombre'
			)
		),
		'middle_name'=>array(
			'Apellido Paterno.'=>array(
				'rule'=>'notEmpty',
				'message'=>'Ingresa tu Apellido Paterno'
			)
		),
		'last_name'=>array(
			'Apellido Paterno.'=>array(
				'rule'=>'notEmpty',
				'message'=>'Ingresa tu Apellido Materno'
			)
		),
		'username'=>array(
			'The username must be between 5 and 25 characters.'=>array(
				'rule'=>array('between', 5, 25),
				'message'=>'Tu nombre de usuario debe tener entre 5 y 25 caracteres'
			),
			'That username has already been taken'=>array(
				'rule'=>'isUnique',
				'message'=>'Este nombre de usuario ya ha sido registrado'
			)
		),
		
		'email'=>array(
			'Valid email'=>array(
				'rule'=>array('email'),
				'message'=>'Correo electronico no v&#225;lido'
			),
			'That email has already been taken'=>array(
				'rule'=>'isUnique',
				'message'=>'Este correo ya ha sido registrado'
			),
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Ingresa tu correo'
			)
		),
		'password'=>array(
		    'Not empty'=>array(
		        'rule'=>'notEmpty',
		        'message'=>'Ingresa tu contrase&#241;a'
		    ),
		    'Match passwords'=>array(
		        'rule'=>'matchPasswords',
		        'message'=>'No coinciden las contrase&#241;as'
		    )
		),
		'password_confirmation'=>array(
		    'Not empty'=>array(
		        'rule'=>'notEmpty',
		        'message'=>'Confirma tu contrase&#241as'
		    )
		)
	);
	
	public function matchPasswords($data) {
	    if ($data['password'] == $this->data['User']['password_confirmation']) {
	        return true;
	    }
	    $this->invalidate('password_confirmation', 'No coinciden las contrase&#241;as');
	    return false;
	}
	
	public function beforeSave() {
	    if (isset($this->data['User']['password'])) {
	        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	    }
	    return true;
	}
}
?>
