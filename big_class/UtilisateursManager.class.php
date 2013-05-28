<?php

/**
 * Utilisateurs
 * 
 * This class has been created by MFD corp
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    1.0
 */
abstract class UtilisateursManager
{
	/**
	 * M�thode permettant d'ajouter un utilisateurs
	 * @param $utilisateurs Utilisateurs le utilisateurs � ajouter
	 * @return void
	 */
	abstract protected function add(Utilisateurs $utilisateurs);
	
	
	/**
	 * M�thode renvoyant le nombre de utilisateurs total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * M�thode permettant de supprimer une utilisateurs
	 * @param $id int L'identifiant du utilisateurs � supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * M�thode retournant une liste de utilisateurs demand�e
	 * @param $debut int Le premier utilisateurs � s�lectionner
	 * @param $limite int Le nombre de utilisateurs � s�lectionner
	 * @return array La liste des utilisateurs. Chaque entr�e est une instance
		de Utilisateurs.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	/**
	 * M�thode retournant la liste des utilisateurs approximativement au mot cl� tap�
	 * 
	 * @return int
	 */
	abstract public function getApproximativeList($motcle);
	
	/**
	 * M�thode retournant la liste des utilisateurs recemment ajout�e
	 * 
	 * @return int
	 */
	abstract public function getRecentList();
	
	
	/**
	 * M�thode retournant un utilisateurs pr�cis
	 * @param $id int L'identifient du utilisateurs � r�cup�rer
	 * @return Utilisateurs Le utilisateurs demand�e
	 */
	abstract public function getUnique($id);
	
	/**
	 * M�thode permettant d'enregistrer un utilisateurs
	 * @param $utilisateurs Utilisateurs le utilisateurs � enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Utilisateurs $utilisateurs)
	{
		if ($utilisateurs->isValid())
		{
			$utilisateurs->isNew() ? $this->add($utilisateurs) : $this->update($utilisateurs);
		}
		else
		{
			 throw new RuntimeException(' L\'utilisateurs doit �tre valide pour �tre enregistr� ');
		}
	}
	/**
	 * M�thode permettant de modifier un utilisateurs
	 * @param $utilisateurs utilisateurs le utilisateurs � modifier
	 * @return void
	 */
	abstract protected function update(Utilisateurs $utilisateurs);

	
}