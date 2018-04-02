<?php
require_once('viewproduct.inc.php');
class Search extends ViewProduct {
	private $pname;
	private $searchType;


	public function  __construct($pname, $searchType) {
		$this->pname = $pname;
		$this->searchType = $searchType;
	}

	public function searchByPartialName() {
		$result = "";
		switch($this->searchType) {
			case 'product':
				$this->showProductByPartialName($this->pname);
				break;
			case 'store':
				// To-DO
				break;
			case 'owner':
				// TO-DO
				break;
			default:
				$result = "Error";
				break;
		}
		return $result;
	}

}
