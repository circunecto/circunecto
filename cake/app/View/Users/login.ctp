<?php
echo $this->Form->create();
echo $this->Form->input('username', array('label' => '', 'class'=>'login-username', 'title'=>'Ingresa tu usuario o email'));
echo $this->Form->input('password', array('label' => '', 'class'=>'login-password', 'title'=>'Ingresa tu contraseña'));
echo $this->Form->end(array('label'=>'Ingresar', 'name'=>'Ingresar','div'=>array('class'=>'boton-ingresar-fake')));
?>
