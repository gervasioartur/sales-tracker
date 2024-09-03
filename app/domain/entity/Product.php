<?php
namespace App\domain\entity;

namespace App\domain\entity;

class Product {
    private int  $id;
    private string $nome;
    private string $desc;
    private float $price;

    public function __construct(string $nome, string $desc, float $price)
    {
        $this->nome = $nome;
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

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
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
