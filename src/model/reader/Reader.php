<?php


namespace Model;

class Reader
{
    public $id;
    public $name;
    public $graduate;
    public $faculty;
    public $email;
    public $phone;
    public $identity;
    public $address;
    public $image;

    public function __construct($name,
                                $graduate,
                                $faculty,
                                $email,
                                $phone,
                                $identity,
                                $address,
                                $image)
    {
        $this->name = $name;
        $this->graduate = $graduate;
        $this->faculty = $faculty;
        $this->email = $email;
        $this->phone = $phone;
        $this->identity = $identity;
        $this->address = $address;
        $this->image = $image;
    }
}