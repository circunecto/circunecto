<?php

class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth'=>array(
            'loginRedirect'=>array('controller'=>'users', 'action'=>'index'),
            'logoutRedirect'=>array('controller'=>'users', 'action'=>'index'),
            'authError'=>"You can't access that page",
            'authorize'=>array('Controller')
        )
    );
    
    public function isAuthorized($user) {
        return true;
    }
    
    public function beforeFilter() {
        $this->Auth->allow('index', 'view', 'verification');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }
}
