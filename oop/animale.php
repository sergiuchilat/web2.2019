<?

spl_autoload_register(function ($class_name) {
    require_once "models/mostenire/" . $class_name . '.php';
});

$rabbit = new Rabbit();
$rabbit->eat();
if(!$rabbit->isHungry()){
	$rabbit->jump();	
	$rabbit->sleep();
	$rabbit->multiply();
}




$fish = new Fish();
$fish->eat();
$fish->jump();
$fish->sleep();
$fish->multiply();