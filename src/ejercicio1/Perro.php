<?php
declare(strict_types=1);

class Perro extends Canido {
    private string $raza;

    public function __construct(string $raza) {
        parent::__construct("Ladrido", "Balanceado/Carne", "Doméstico", "Canis lupus familiaris");
        $this->raza = $raza;
    }

    public function getRaza(): string { return $this->raza; }
}