<?php

/**
 * News
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27
 */
abstract class NewsManager
{
	/**
	 * M�thode permettant d'ajouter une news
	 * @param $news News la news � ajouter
	 * @return void
	 */
	abstract protected function add(News $news);
	
	
	/**
	 * M�thode renvoyant le nombre de news total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * M�thode permettant de supprimer unee news
	 * @param $id int L'identifiant de la news � supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * M�thode retournant une liste de news demand�es
	 * @param $debut int le premier news � s�lactionner
	 * @param $limite int le nombre de news � s�lactionner
	 * @return array La liste des news. Chaque entr�e est unee instance
		de News.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	/**
	 * M�thode retournant une news pr�cise
	 * @param $id int L'identifient de la news � r�cup�rer
	 * @return News la news demand�e
	 */
	abstract public function getUnique($id);
	
	/**
	 * M�thode permettant d'enregistrer une news
	 * @param $news News la news � enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(News $news)
	{
		if ($news->isValid())
		{
			$news->isNew() ? $this->add($news) : $this->update($news);
		}
		else
		{
			throw new RunetimeException('La news doit �tre valide pour �tre enregistr�e');
		}
	}
	/**
	 * M�thode permettant de modifier une news
	 * @param $news news la news � modifier
	 * @return void
	 */
	abstract protected function update(News $news);

	
}