<?
class PC{
	private $brand;
	private $freeSpace = 1000;

	public function __construct ($brand) {
		$this->brand = $brand;
	}

	public function setFreeSpace ($freeSpace) {
		if(!is_numeric($freeSpace)){
			return;
		}
		$this->freeSpace = $freeSpace;
	}

	public function getFreeSpace(){
		return $this->freeSpace;
	}

}