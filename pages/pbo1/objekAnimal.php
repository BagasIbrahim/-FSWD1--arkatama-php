<?php
require_once 'Animal.php';
require_once 'Cat.php';
require_once 'Dog.php';
// Membuat objek Animal
$animal = new Animal("Harimau", "karnivora.");
echo $animal->getInfo();
echo "<br>";

// Membuat objek Cat
$cat = new Cat("Meong");
echo $cat->getInfo();
echo "<br>";

// Membuat objek Dog
$dog = new Dog("Bobby");
echo $dog->getInfo();

?>