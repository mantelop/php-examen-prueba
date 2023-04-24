<?php

require_once 'Anfibio.php';

// Clase Urodelo, especialización de Anfibio
class Urodelo extends Anfibio {
  private string $tipo;

  public function __construct(string $codigo, int $anioAltaCatalogo, float $precio, string $nombreCientifico, string $nombreComun, string $habitat, string $tipo) {
      parent::__construct($codigo, $anioAltaCatalogo, $precio, $nombreCientifico, $nombreComun, $habitat);
      $this->tipo = $tipo;
  }

  public function getTipo(): string {
      return $this->tipo;
  }

  public function setPrecioMasCaro(): void {
      $precio = $this->getPrecio();
      $precio += $precio * 0.05; // incremento del 5%
      $this->setPrecio($precio);
  }
}