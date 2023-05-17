<?php
require_once 'Animal.php';

//membuat kelas dog yang merupakan turunan dari kelas Animal
class Dog extends Animal {
    //overide = mengganti
    function __construct($nama) {
        $this->nama = $nama;
        $this->jenis = "anjing.";
}
    function getInfo() {
        return parent::getInfo() . "\nAnjing adalah hewan peliharaan yang setia dan penurut.";
    }
}