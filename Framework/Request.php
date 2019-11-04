<?php

// A pour rôle de modéliser une requête
class Request 
{
	// Paramètres de la requête
	private $params;
	/** Objet session associé à la requête */
	private $session;
	public function __construct($params)
	{
		$this->params = $params;
		$this->session = new Session();
	}
	
	public function getSession()
	{
	    return $this->session;
	}
	// Renvoie vrai si le paramètre existe dans la requête
	public function existsParams($name)
	{
		return (!empty($this->params[$name]));
	}
	// Renvoie la valeur du paramètre demandé
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