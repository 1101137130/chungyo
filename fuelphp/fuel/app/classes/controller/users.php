<?php

class Controller_Users extends Controller_Template
{
	public function action_login()
	{	
		$data["subnav"] = array('login'=> 'active' );
		$auth = Auth::instance();
		
		$view = View::forge('users/login', $data);
		$form = Form::forge('login');
		$form->add('username', 'Username:');
		$form->add('password', 'Password:', array('type'=>'password'));
		$form->add('submit', '', array('type'=>'submit','value' => 'Login'));
		if (Input::post())
		{
			if ($auth->login(Input::post('username'),Input::post('password')))
			{
				Session::set_flash('success','Successgully logged in! Welcome '. $auth->get_screen_name());
				Response::redirect('messages/');
				}else{
				Session::set_flash('error','Username or password incorrect.');
				}					
		}
		$view->set('reg',$form, false);
		$this->template->title = 'Users &raquo; Login';
		$this->template->content = $view;
	}

	public function action_logout()
	{
		$auth = Auth::instance();
		$auth->logout();
		Session::set_flash('success','Logged out');
		Response::redirect('messages/');
		//$data["subnav"] = array('logout'=> 'active' );
		//$this->template->title = 'Users &raquo; Logout';
		//$this->template->content = View::forge('users/logout', $data);
	}
	
	public function action_register($fieldset = null, $errors = null)
	{
		$data["subnav"] = array('register'=> 'active' );
		$auth = Auth::instance();
		$view = View::forge('users/register', $data);

		if (empty($fieldset))
		{
			$fieldset = Fieldset::forge('regiser');
			Model_User::populate_register_fieldset($fieldset);
		}

		$view->set('reg',$fieldset->build(), false);
		
		if($errors) $view->set_safe('errors', $errors);
		
		$this->template->title = 'Users &raquo; Register';
		$this->template->content = $view;
		
	}
	protected function link_provider($userid)
{
    // do we have an auth strategy to match?
    if ($authentication = \Session::get('auth-strategy.authentication', array()))
    {
        // don't forget to pass false, we need an object instance, not a strategy call
        $opauth = \Auth_Opauth::forge(false);

        // call Opauth to link the provider login with the local user
        $insert_id = $opauth->link_provider(array(
            'parent_id' => $userid,
            'provider' => $authentication['provider'],
            'uid' => $authentication['uid'],
            'access_token' => $authentication['access_token'],
            'secret' => $authentication['secret'],
            'refresh_token' => $authentication['refresh_token'],
            'expires' => $authentication['expires'],
            'created_at' => time(),
        ));
    }
}
	public function get_register($fieldset = null, $errors = null)
	{
    $data["subnav"] = array('register'=> 'active' );
    $auth = Auth::instance();
    $view = View::forge('users/register', $data);
 
    if (empty($fieldset))
    {
        $fieldset = Fieldset::forge('register');
        Model_User::populate_register_fieldset($fieldset);
    }
 
    $view->set('reg', $fieldset->build(), false);
    if ($errors) $view->set_safe('errors', $errors);
    $this->template->title = 'Users &raquo; Register';
    $this->template->content = $view;
	}
	public function post_register()
	{
		$fieldset = Model_User::populate_register_fieldset(Fieldset::forge('register'));
		$fieldset->repopulate();
		$result = Model_User::validate_registration($fieldset, Auth::instance());
		if($result['e_found'])
		{
			return $this->get_register($fieldset, $result['errors']);			
		} 
		Session::set_flash('success', 'User created.');
		Response::redirect('./');
	}

}
