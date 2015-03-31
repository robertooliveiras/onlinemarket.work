<?php

namespace Market\Controller;

trait ListingsTableTrait {
	
	private $listingsTabel;
	
	public function setListingsTable($listingsTable) {
		$this->listingsTabel = $listingsTable;
	}
}

?>