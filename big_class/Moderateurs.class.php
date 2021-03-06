<?php

/**
 * Moderateurs
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epharma
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Moderateurs
{
	protected $erreur=array(),
			  $_pass,
			  $_droit,
			  $_pseudo,
			  $_existence,
			  $_heriteUtilisateur;
			  
			  
	const  PASS_INVALIDE=1;
	const  PSEUDO_INVALIDE=2;
	const  HERITEUTILISATEUR_INVALIDE=3;
			  
	public function __construct($valeur=array())
	{
		if(!empty($valeur))
		{
			$this->hydrate($valeur);
		}
	}
	
	public function hydrate($donnees)
	{
		foreach($donnees as $attribut => $valeur)
		{
			$methode= 'set'.ucfirst($attribut);
			if (is_callable(array($this, $methode)))
			{
				$this->$methode($valeur);
			}
		}
	}
			  
	public function isNew()
	{
		return empty($this->_heriteUtilisateur);
	}
		
	public function isValid()
	{
		return !(empty($this->_pass)||empty($this->_droit)||empty($this->_pseudo)||empty($this->_existence) || empty($this->_heriteUtilisateur));
	}
		
	//LISTES DES SETTERS
	
	
	public function setPass($pass)
	{
		if(is_string($pass)&& !empty($pass))
		{
			$this->_pass=(string)htmlspecialchars($pass);
		}
		else
		{
			$this->erreur[]=self::PASS_INVALIDE;
		}
	}
	
	public function setDroit($droit)
	{
		if(is_int($droit)&& !empty($droit)&&strlen($droit)==3)
		{
			$this->_droit=(int)htmlspecialchars($droit);
		}
		else
		{
			$this->erreur[]=self::DROIT_INVALIDE;
		}
	}
	
	public function setPseudo($pseudo)
	{
		if(is_string($pseudo)&&strlen($pseudo)<=30)
		{
			$this->_pseudo=(string)htmlspecialchars($pseudo);
			
		}
		else
		{
			$this->erreur[]=self::PSEUDO_INVALIDE;
		}
	}
	
	public function setExistence($existence)
	{
		if(is_string($existence)&& strlen($existence)==1)
		{
			$this->_existence=(string)htmlspecialchars($existence);
		}
		else
		{
			$this->erreur[]=self::EXISTENCE_INVALIDE;
		}
	}
	
	public function setHeriteUtilisateur($heriteUtilisateur)
	{
		
			$this->_heriteUtilisateur=(int)htmlspecialchars($heriteUtilisateur);
	}
	
	//LISTE DES GETTERS
	
	public function pass()
	{
		return $this->_pass;
	}
	
	public function droit()
	{
		return $this->_droit;
	}
	
	public function pseudo()
	{
		return $this->_pseudo;
	}
	
	public function existence()
	{
		return $this->_existence;
	}
	
	public function heriteutilisateur()
	{
		return $this->_heriteutilisateur;
	}
	
	public function erreur()
	{
		return $this->_erreur;
	}
}