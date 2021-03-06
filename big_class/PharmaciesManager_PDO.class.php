<?php

/**
 * Pharmacies
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epharma
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PharmaciesManager_PDO extends PharmaciesManager
{
	protected $_db;
	
	public function __construct(PDO $db)
	{
		$this->_db=$db;
	}
	
	protected function add(Pharmacies $pharmacie)
	{
		$requete=$this->_db->prepare('INSERT INTO pharmacies SET nom=:nom, siteinternet=:siteinternet, tel1=:tel1, tel2=:tel2, fax=:fax, region=:region,  departement=:departement, autorisation=:autorisation, existence=\'1\', proprietaire=:proprietaire, datecreation=NOW(), ville=:ville, adresse=:adresse ');
		$requete->BindValue(':nom', $pharmacie->nom());
		$requete->BindValue(':siteinternet', $pharmacie->siteinternet());
		$requete->BindValue(':tel1', $pharmacie->tel1());
		$requete->BindValue(':tel2', $pharmacie->tel2());
		$requete->BindValue(':fax', $pharmacie->fax());
		$requete->BindValue(':region', $pharmacie->region());
		$requete->BindValue(':departement', $pharmacie->departement());
		$requete->BindValue(':proprietaire', $pharmacie->proprietaire());
		$requete->BindValue(':ville', $pharmacie->ville());
		$requete->BindValue(':adresse', $pharmacie->adresse());
		$requete->BindValue(':autorisation', $pharmacie->autorisation());
		$requete->execute();
	}
	
	public function count()
	{
		return $this->_db->query('SELECT COUNT(*) FROM pharmacies')->fetchColumn();
	}
	
	public function countRecentMonth()
	{
		return $this->_db->query('SELECT COUNT(*) FROM pharmacie WHERE MONTH(datecreation)=MONTH(NOW())')->fetchColumn();
	}
	
	public function getList($debut= -1, $limite = -1)
	{
		$listepharmacies = array();
		$sql='SELECT idpharmacies, nom, siteinternet, tel1, tel2, fax, region, departement, ville, adresse, proprietaire, autorisation, DATE_FORMAT(datecreation, \'le %d/%m/%Y � %Hh%i\') AS datecreation FROM pharmacies WHERE existence=\'1\' ORDER BY datecreation DESC';
		
		if($debut != -1 || $limite != -1)
		{
			$sql .= ' LIMIT '.(int)(htmlspecialchars($limite)).' OFFSET '.(int)(htmlspecialchars($debut));
		}
		$requete=$this->_db->query($sql);
		while($donnees=$requete->fetch(PDO::FETCH_ASSOC))
		{
			$listpharmacies[]=new Pharmacies($donnees);
		}
		return $listepharmacies;
	}
	
	public function delete($id)
	{
		$requete->_db->prepare('UPDATE pharmacies  SET existence=\'0\' WHERE idpharmacies=:id');
		$requete->BindValue(':id', (int)htmlspecialchars($id), PDO::PARAM_INT);
		$requete->execute();
		$requete->closeCursor();
	}
	
	public function getMonthList()
	{
		$listpharmacies = array();
		$requete=$this->_db->query('SELECT idpharmacies, nom, siteinternet, tel1, tel2, fax, region, departement, ville, adresse, proprietaire, autorisation, DATE_FORMAT(datecreation, \'le %d/%m/%Y � %Hh%i\') AS datecreation FROM pharmacies WHERE MONTH(datecreation)=MONTH(NOW()) ORDER BY idpharmacies DESC');
		while($donnees=$requete->fetch(PDO::FETCH_ASSOC))
		{
			$listpharmacies[]=new Pharmacies($donnees);
		}
		return $listpharmacies;
	}
	
	public function getApproximativeList($motcle)
	{
		$requete=$this->_db->query('SELECT * FROM pharmacies WHERE nom LIKE \''.$motcle.'%\' OR tel1 LIKE \''.$motcle.'%\' OR tel2 LIKE \''.$motcle.'%\' OR region LIKE \''.$motcle.'%\' OR departement LIKE \''.$motcle.'%\' OR ville LIKE \''.$motcle.'%\'');
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pharmacies');
		$listepharmacies=$requete->fetchAll();
		$requete->closeCursor();
		return $listpharmacies;
	}
	
	public function getRecentList()
	{
		$listepharmacies = array();
		$requete=$this->_db->query('SELECT idpharmacies, nom, siteinternet, tel1, tel2, fax, region, departement, ville, adresse, proprietaire, autorisation FROM pharmacies ORDER BY idpharmacies DESC LIMIT 0, 3');
		while($donnees=$requete->fetch(PDO::FETCH_ASSOC))
		{
			$listepharmacies[]= new Pharmacies($donnees);
		}
		return $listepharmacies;
	}
	
	public function getUnique($id)
	{
		$requete=$this->_db->query('SELECT idpharmacies, nom, region, departement, ville, tel1 FROM pharmacies WHERE existence=\'0\' AND idpharmacie=:id');
		$requete->BindValue(':id', (int)htmlspecialchars($id), PDO::PARAM_INT);
		$requete->execute();
		$requete->closeCursor();
	}
	
	protected function update(Pharmacies $pharmacie)
	{
		$requete=$this->_db->prepare('UPDATE pharmacies SET nom=:nom, siteinternet=:siteinternet, tel1=:tel1, tel2=:tel2, fax=:fax, region=:region, departement=:departement, ville=:ville, adresse=:adresse, proprietaire=:proprietaire, autorisation=:autorisation WHERE idproduits=:id');
		$requete->BindValue(':nom', $pharmacie->nom());
		$requete->BindValue(':siteinternet', $pharmacie->siteinternet());
		$requete->BindValue(':tel1', $pharmacie->tel1());
		$requete->BindValue(':tel2', $pharmacie->tel2());
		$requete->BindValue(':fax', $pharmacie->fax());
		$requete->BindValue(':region', $pharmacie->region());
		$requete->BindValue(':departement', $pharmacie->departement());
		$requete->BindValue(':proprietaire', $pharmacie->proprietaire());
		$requete->BindValue(':ville', $pharmacie->ville());
		$requete->BindValue(':adresse', $pharmacie->adresse());
		$requete->BindValue(':autorisation', $pharmacie->autorisation());
		$requete->BindValue(':id', $pharmacie->idpharmacies());
		$requete->execute();
		$requete->closeCursor();
	}
}