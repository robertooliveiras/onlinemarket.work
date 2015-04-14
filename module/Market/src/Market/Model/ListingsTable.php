<?php

namespace Market\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class ListingsTable extends TableGateway {
	public static $tableName = "listings";
	
	public function getTableName(){
		return self::$tableName;
	}
	
	public function getListingsByCategory($category){
		return $this->select(["category"=>$category]);
	}
	
	public function getListingsById($id){
		return $this->select(["listings_id"=>$id])->current();
	}
	
	public function getLatestListings(){
		$select = new Select();
		$select->from($this->getTableName())
				->order('listings_id DESC')
				->limit(1)
		;
		
		return $this->selectWith($select)->current();
	}
	
	public function addPosting($data){
		$data['title'] = trim($data['title']);
		$data['description'] = trim($data['description']);
		$data['photo_filename'] = trim($data['photo_filename']);
		$data['contact_name'] = trim($data['contact_name']);
		$data['contact_phone'] = trim($data['contact_phone']);
		$data['contact_email'] = trim($data['contact_email']);
		$data['city'] = trim($data['city']);
		$data['country'] = trim($data['country']);
		$data['price'] = trim($data['price']);

		unset($data['submit']);
		$this->insert($data);
	}
}

