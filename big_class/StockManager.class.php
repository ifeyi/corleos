<?php

/**
 * Stock
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29
 */
abstract class Stock
{
	/**
	 * M�thode permettant d'ajouter un stock
	 * @param $stock Stock le stock � ajouter
	 * @return void
	 */
	abstract protected function add(Stock $stock);
	
	
	/**
	 * M�thode renvoyant le nombre de stock total
	 * @return int
	 */
	abstract public function count();
	
	
	/**
	 * M�thode renvoyant le nombre de produit total dans le stock d'une pharmacie
	 * @return int
	 */
	abstract public function countProduitStockPharmacie($idpharmacie);
	
	
	/**
	 * M�thode permettant de supprimer un stock
	 * @param $id int L'identifiant du stock � supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * M�thode retournant un stock pr�cis
	 * @param $id int L'identifient du stock � r�cup�rer
	 * @return Stock Le stock demand�
	 */
	abstract public function getUnique($id);
	
	
	/**
	 * M�thode renvoyant la liste de produit pour une pharmacie donn�e
	 * @return int
	 */
	abstract public function getPharmaProduitlist($idpharmacie);
	
	
	/**
	 * M�thode permettant d'enregistrer un stock
	 * @param $stock Stock le stock � enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Stock $stock)
	{
		if ($stock->isValid())
		{
			$stock->isNew() ? $this->add($stock) : $this->update($stock);
		}
		else
		{
			throw new RuntimeException('Le stock doit �tre valide pour �tre enregistr�');
		}
	}
	
	
	/**
	 * M�thode permettant de modifier un stock
	 * @param $stock stock le stock � modifier
	 * @return void
	 */
	abstract protected function update(Stock $stock);

	
}