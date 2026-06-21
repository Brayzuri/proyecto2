<?php
declare(strict_types=1);

abstract class Animal {
    protected string $sonido;
    protected string $alimentos;
    protected string $habitat;
    protected string $nombreCientifico;

    public function __construct(string $sonido, string $alimentos, string $habitat, string $nombreCientifico) {
        $this->sonido = $sonido;
        $this->alimentos = $alimentos;
        $this->habitat = $habitat;
        $this->nombreCientifico = $nombreCientifico;
    }

    public function getNombreCientifico(): string { return $this->nombreCientifico; }
    public function getSonido(): string { return $this->sonido; }
    public function getAlimentos(): string { return $this->alimentos; }
    public function getHabitat(): string { return $this->habitat; }
}