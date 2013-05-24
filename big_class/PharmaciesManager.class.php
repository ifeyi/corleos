<?php

/**
 * Pharmacies
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PharmaciesManager
{
	/**
	 * M�thode permettant d'ajouter une pharmacie
	 * @param $pharmacie Pharmacies le pharmacie � ajouter
	 * @return void
	 */
	abstract protected function add(Pharmacies $pharmacie);
	
	
	/**
	 * M�thode renvoyant le nombre de pharmacie totale
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * M�thode permettant de supprimer une pharmacie
	 * @param $id int L'identifiant de la pharmacie � supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * M�thode retournant une liste de pharmacie demand�e
	 * @param $debut int La premi�re pharmacie � s�lectionner
	 * @param $limite int Le nombre de pharmacie � s�lectionner
	 * @return array La liste des pharmacie. Chaque entr�e est une instance
		de Pharmacies.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	/**
	 * M�thode retournant la liste des pharmacie approximativement au mot cl� tap�
	 * 
	 * @return int
	 */
	abstract public function getApproximativeList($motcle);
	
	/**
	 * M�thode retournant la liste des pharmacie recemment ajout�e
	 * 
	 * @return int
	 */
	abstract public function getRecentList();
	
	/**
	 * M�thode retournant une pharmacie pr�cise
	 * @param $id int L'identifient du pharmacie � r�cup�rer
	 * @return Pharmacies Le pharmacie demand�e
	 */
	abstract public function getUnique($id);
	
	/**
	 * M�thode permettant d'enregistrer une pharmacie
	 * @param $pharmacie Pharmacies le pharmacie � enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Pharmacies $pharmacie)
	{
		if ($pharmacie->isValid())
		{
			$pharmacie->isNew() ? $this->add($pharmacie) : $this->update($pharmacie);
		}
		else
		{
			throw new RuntimeException('La pharmacie doit �tre valide pour �tre enregistr�e');
		}
	}
	/**
	 * M�thode permettant de modifier une pharmacie
	 * @param $pharmacie pharmacie la pharmacie � modifier
	 * @return void
	 */
	abstract protected function update(Pharmacies $pharmacie);

	
}