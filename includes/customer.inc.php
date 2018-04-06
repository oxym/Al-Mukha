<?php
require_once('dbh.inc.php'); 
class Customer extends Dbh {
	private $uid;
	function __construct($uid) {
		$this->uid = $uid;
	}

	public function getAllPurchases() {
		$sql = "
			SELECT * FROM Purchase_Comment Where UID = ? ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$this->uid]);

		$purchases = $stmt->fetchAll();
		return $purchases;

	}

	public function comment($sid, $name, $rate, $com) {
		if (!(isset($_POST['submit']))) {

		} else {
			$sql = "UPDATE Purchase_Comment SET Rating = ?, Comment_Time = now(), Comment = ? WHERE UID = ? AND SID = ? AND PName = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$rate,$com, $this->uid, $sid, $name]);
		}
	}

}



?>