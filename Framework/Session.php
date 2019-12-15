<?php

namespace Framework;

abstract class Session
{
	protected $session;
	
	public function Session(Session $session) 
	{
		$this->session = $_SESSION;
	}
	
}