<?php
class Search extends ViewProduct
	private $pname;
	private $searchType


	public function  __construct($pname, $searchType) {
		$this->pname = $pname;
		$this->searchType = $searchType;
	}

	public function searchByPartial() {
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
		return $result
	}

