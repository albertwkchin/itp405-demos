<?php

class Product {

    public $name;
    private $price;
    protected $size;

    public function getName()
    {
        return $this->name;
    }

    public function __construct($name = null, $price = 50) // set default price
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
};

class Shoe extends Product {
    public static $count = 0;

    public function __construct()
    {
        static::$count = static::$count + 1;
        parent::__construct( );
    }
}

$product = new Product('Go Run', 60);
$product->getName();
$product->name;

$product2 = new Product('memory foam');



