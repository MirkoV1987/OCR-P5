<?php

namespace Framework;

abstract class Controller extends View
{
	private $action;
	protected $request;
	
	/** Définit la requête entrante
	 *
	 * @param Request $request Requête entrante
	 */
	public function setRequest(Request $request) 
	{
		$this->request = $request;
	}
	
}