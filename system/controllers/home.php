<?php

/**
 *
 */
class Home extends Controller
{

	public function index()
	{
		$this->view('home/index');
	}

	public function terms()
	{
		$this->view('home/terms');
	}
}
