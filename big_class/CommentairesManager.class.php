<?php

/**
 * Commentaires
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z
 */
abstract class Commentaires 
{
	/**
	 * M�thode permettant d'ajouter un commentaire
	 * @param $commentaire Commentaire le commentaire � ajouter
	 * @return void
	 */
	abstract protected function add(Commentaire $commentaire);
	
	
	/**
	 * M�thode renvoyant le nombre de commentaire total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * M�thode permettant de supprimer une commentaire
	 * @param $id int L'identifiant du commentaire � supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * M�thode retournant une liste de commentaire demand�e
	 * @param $debut int Le premier commentaire � s�lectionner
	 * @param $limite int Le nombre de commentaire � s�lectionner
	 * @return array La liste des commentaire. Chaque entr�e est une instance
		de Commentaire.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	
	/**
	 * M�thode retournant un commentaire pr�cis
	 * @param $id int L'identifient du commentaire � r�cup�rer
	 * @return Commentaire Le commentaire demand�e
	 */
	abstract public function getUnique($id);
	
	/**
	 * M�thode permettant d'enregistrer un commentaire
	 * @param $commentaire Commentaire le commentaire � enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Commentaire $commentaire)
	{
		if ($commentaire->isValid())
		{
			$commentaire->isNew() ? $this->add($commentaire) : $this->update($commentaire);
		}
		else
		{
			throw new RuntimeException('La commentaire doit �tre valide pour �tre enregistr�');
		}
	}
	/**
	 * M�thode permettant de modifier un commentaire
	 * @param $commentaire commentaire le commentaire � modifier
	 * @return void
	 */
	abstract protected function update(Commentaire $commentaire);

	
}