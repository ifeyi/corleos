<?php

/**
 * Reponsemessage
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Reponsemessage
{
	/**
	 * M�thode permettant d'ajouter un reponsemessage
	 * @param $reponsemessage Reponsemessage le reponsemessage � ajouter
	 * @return void
	 */
	abstract protected function add(Reponsemessage $reponsemessage);
	
	
	/**
	 * M�thode renvoyant le nombre de reponsemessage total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * M�thode permettant de supprimer une reponsemessage
	 * @param $id int L'identifiant du reponsemessage � supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * M�thode retournant une liste de reponsemessage demand�e
	 * @param $debut int Le premier reponsemessage � s�lectionner
	 * @param $limite int Le nombre de reponsemessage � s�lectionner
	 * @return array La liste des reponsemessage. Chaque entr�e est une instance
		de Reponsemessage.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	
	/**
	 * M�thode retournant un reponsemessage pr�cis
	 * @param $id int L'identifient du reponsemessage � r�cup�rer
	 * @return Reponsemessage Le reponsemessage demand�e
	 */
	abstract public function getUnique($id);
	
	/**
	 * M�thode permettant d'enregistrer un reponsemessage
	 * @param $reponsemessage Reponsemessage le reponsemessage � enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Reponsemessage $reponsemessage)
	{
		if ($reponsemessage->isValid())
		{
			$reponsemessage->isNew() ? $this->add($reponsemessage) : $this->update($reponsemessage);
		}
		else
		{
			throw new RuntimeException('La reponsemessage doit �tre valide pour �tre enregistr�');
		}
	}
	/**
	 * M�thode permettant de modifier un reponsemessage
	 * @param $reponsemessage reponsemessage le reponsemessage � modifier
	 * @return void
	 */
	abstract protected function update(Reponsemessage $reponsemessage);

	

}