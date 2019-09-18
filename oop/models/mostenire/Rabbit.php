<?
class Rabbit extends Animal{

	public function jump() {
		echo "Rabbit jump";
	}

	public function eat() {
		$this->hungry = false;
		echo "Rabbit eat";
	}

	public function sleep(){
		echo "Rabbit sleep";
	}

	public function multiply () {
		echo "Rabbit mltiply";
	}
}