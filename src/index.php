<?php
declare(strict_types=1);

// Cargar Ejercicio 1 
require_once __DIR__ . '/Ejercicio1/Animal.php';
require_once __DIR__ . '/Ejercicio1/Canido.php';
require_once __DIR__ . '/Ejercicio1/Felino.php';
require_once __DIR__ . '/Ejercicio1/Perro.php';
require_once __DIR__ . '/Ejercicio1/Gato.php';

// Cargar Ejercicio 2
require_once __DIR__ . '/Ejercicio2/Interfaces/Actor.php';
require_once __DIR__ . '/Ejercicio2/Interfaces/ObjetoInerte.php';
require_once __DIR__ . '/Ejercicio2/Persona.php';
require_once __DIR__ . '/Ejercicio2/Profesor.php';
require_once __DIR__ . '/Ejercicio2/Vehiculo.php';



// --- PROBANDO EJERCICIO 1 ---
$miPerro = new Perro("Golden Retriever");
echo "El perro hace: " . $miPerro->getSonido() . "\n";
echo "Nombre científico: " . $miPerro->getNombreCientifico() . "\n";

echo "-------------------------------------------\n";

// --- PROBANDO EJERCICIO 2 ---
$profe = new Profesor("Carlos", 42, "Programación");
echo $profe->realizarAccion() . "\n";

$miCoche = new Vehiculo("Toyota", "Corolla");
echo "El auto está hecho de: " . $miCoche->getMaterialPrincipal() . "\n";