<?php

namespace App\domain\entity;

class Customer
{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $address;

    public function __construct($name, $email, $phone = null, $address = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
}
