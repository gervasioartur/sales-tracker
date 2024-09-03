<?php
namespace App\domain\entity;

namespace App\domain\entity;

class Product {
    private int  $id;
    private string $name;
    private string $desc;
    private float $price;

    public function __construct(string $name, string $desc, float $price)
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDesc(): string
    {
        return $this->desc;
    }

    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
