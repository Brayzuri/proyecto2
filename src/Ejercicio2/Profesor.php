<?php
declare(strict_types=1);

class Profesor extends Persona {
    private string $especialidad;

    public function __construct(string $nombre, int $edad, string $especialidad) {
        parent::__construct($nombre, $edad);
        $this->especialidad = $especialidad;
    }

    public function realizarAccion(): string {
        return "El profesor {$this->nombre} está dictando una clase de {$this->especialidad}.";
    }
}