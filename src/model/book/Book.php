<?php


namespace Model;

class Book
{
    public $id;
    public $name;
    public $publisher;
    public $author;
    public $quantity;
    public $price;
    public $location;
    public $category;
    public $image;

    public function __construct($name,
                                $publisher,
                                $author,
                                $category,
                                $quantity,
                                $price,
                                $location,
                                $image)
    {
        $this->name = $name;
        $this->publisher = $publisher;
        $this->author = $author;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->location = $location;
        $this->category = $category;
        $this->image = $image;
    }
}