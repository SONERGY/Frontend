<?php

/**
 * 
 */
class Controller
{
	public function model($model)
	{
		require_once 'system/models/'. $model .'.php';
		return new $model();
	}


	public function view($view, $data = [])
	{
		require_once 'system/views/'. $view .'.php';
		
	}
	
}