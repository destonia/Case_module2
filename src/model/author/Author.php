<?php


namespace Model;

class Author
{
    public $id;
    public $name;
    public $category;
    public $quantity;
    public $image;

    public function __construct($name, $category, $quantity, $image)
    {
        $this->name = $name;
        $this->category = $category;
        $this->quantity = $quantity;
        $this->image = $image;
    }
}