<?
class Fish extends Animal {

	public function jump() {
		echo "Fish jump";
	}

	public function eat() {
		$this->hungry = false;
		echo "Fish eat";
	}

	public function sleep(){
		echo "Fish sleep";
	}

	public function multiply () {
		echo "Fish mltiply";
	}
}