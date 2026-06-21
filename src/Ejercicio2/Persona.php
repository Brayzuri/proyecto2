<?php
declare(strict_types=1);

abstract class Persona implements Actor {
    protected string $nombre;
    protected int $edad;

    public function __construct(string $nombre, int $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}