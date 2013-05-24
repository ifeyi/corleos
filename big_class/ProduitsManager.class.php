<?php

/**
 * Produits
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class ProduitsManager
{
	/**
	 * M�thode permettant d'ajouter un produit
	 * @param $produit Produit le produit � ajouter
	 * @return void
	 */
	abstract protected function add(Produits $produit);
	
	
	/**
	 * M�thode renvoyant le nombre de produit total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * M�thode permettant de supprimer une produit
	 * @param $id int L'identifiant du produit � supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * M�thode retournant une liste de produit demand�e
	 * @param $debut int Le premier produit � s�lectionner
	 * @param $limite int Le nombre de produit � s�lectionner
	 * @return array La liste des produit. Chaque entr�e est une instance
		de Produit.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	/**
	 * M�thode retournant la liste des produits approximativement au mot cl� tap�
	 * 
	 * @return int
	 */
	abstract public function getApproximativeList($motcle);
	
	/**
	 * M�thode retournant la liste des produits recemment ajout�e
	 * 
	 * @return int
	 */
	abstract public function getRecentList();
	
	
	/**
	 * M�thode retournant un produit pr�cis
	 * @param $id int L'identifient du produit � r�cup�rer
	 * @return Produit Le produit demand�e
	 */
	abstract public function getUnique($id);
	
	/**
	 * M�thode permettant d'enregistrer un produit
	 * @param $produit Produit le produit � enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Produits $produit)
	{
		if ($produit->isValid())
		{
			$produit->isNew() ? $this->add($produit) : $this->update($produit);
		}
		else
		{
			throw new RuntimeException('La produit doit �tre valide pour �tre enregistr�');
		}
	}
	/**
	 * M�thode permettant de modifier un produit
	 * @param $produit produit le produit � modifier
	 * @return void
	 */
	abstract protected function update(Produits $produit);

	
}