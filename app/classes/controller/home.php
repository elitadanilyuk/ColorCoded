<?php

class Controller_Home extends Controller_Template
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
        $data = array();
		$this->template->title = 'Home Page';
		$this->template->content = View::forge('home/index', $data);
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(Presenter::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}

	public function action_other() {
		$data = array();
		$this->template->title = 'Other Page';
		$this->template->content = View::forge('home/other', $data);
	}
}


/*
$data = array();
$this->template->title = 'Home Page';
$this->template->content = View::forge('home/index', $data);

return Response::forge(View::forge('home/index'));
 */