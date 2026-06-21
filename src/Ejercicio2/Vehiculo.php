<?php
declare(strict_types=1);

class Vehiculo implements Actor, ObjetoInerte {
    protected string $marca;
    protected string $modelo;

    public function __construct(string $marca, string $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function realizarAccion(): string {
        return "El vehículo {$this->marca} {$this->modelo} está en movimiento.";
    }

    public function getMaterialPrincipal(): string {
        return "Metal y Plástico";
    }
}