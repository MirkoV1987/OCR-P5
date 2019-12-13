<?php

class Request 
{
	private $params;
	private $session;

	public function __construct($params)
	{
		$this->params = $params;
	}
	
	public function getSession()
	{
	    return $this->session;
	}

	public function existsParams($name)
	{
		return (!empty($this->params[$name]));
	}

	public function getParams($name)
	{
		if ($this->existsParams($name))
		{
		  return htmlspecialchars($this->params[$name]);
		}
		else 
		{
		  throw new \Exception("Paramètre '$name' absent de la requête");
		}
	}
}