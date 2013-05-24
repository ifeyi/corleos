<?php

/**
 * Messages
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z
 */
class Messages 
{
	/**
	 * M�thode permettant d'ajouter un message
	 * @param $message Message le message � ajouter
	 * @return void
	 */
	abstract protected function add(Message $message);
	
	
	/**
	 * M�thode renvoyant le nombre de message total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * M�thode permettant de supprimer une message
	 * @param $id int L'identifiant du message � supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * M�thode retournant une liste de message demand�e
	 * @param $debut int Le premier message � s�lectionner
	 * @param $limite int Le nombre de message � s�lectionner
	 * @return array La liste des message. Chaque entr�e est une instance
		de Message.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	
	/**
	 * M�thode retournant un message pr�cis
	 * @param $id int L'identifient du message � r�cup�rer
	 * @return Message Le message demand�e
	 */
	abstract public function getUnique($id);
	
	/**
	 * M�thode permettant d'enregistrer un message
	 * @param $message Message le message � enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Message $message)
	{
		if ($message->isValid())
		{
			$message->isNew() ? $this->add($message) : $this->update($message);
		}
		else
		{
			throw new RuntimeException('La message doit �tre valide pour �tre enregistr�');
		}
	}
	/**
	 * M�thode permettant de modifier un message
	 * @param $message message le message � modifier
	 * @return void
	 */
	abstract protected function update(Message $message);
	
}