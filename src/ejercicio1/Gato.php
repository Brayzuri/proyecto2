<?php
declare(strict_types=1);

class Gato extends Felino {
    private bool $leGustaElAgua;

    public function __construct(bool $leGustaElAgua = false) {
        parent::__construct("Maullido", "Pescado/Croquetas", "Doméstico", "Felis catus");
        $this->leGustaElAgua = $leGustaElAgua;
    }

    public function getLeGustaElAgua(): bool { return $this->leGustaElAgua; }
}