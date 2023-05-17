<?php
require_once 'Animal.php';

//membuat kelas cat  yang merupakan turunan dari kelas Animal
class Cat extends Animal {
    //overide = mengganti
    function __construct($nama) {
        $this->nama = $nama;
        $this->jenis = "kucing.";
}
    function getInfo() {
        return parent::getInfo() . "\nKucing adalah hewan peliharaan yang lucu dan menggemaskan.";
    }

}