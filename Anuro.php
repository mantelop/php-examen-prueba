<?php

require_once 'Anfibio.php';

// Clase Anuro, especialización de Anfibio
class Anuro extends Anfibio {
  private string $continente;

  public function __construct(string $codigo, int $anioAltaCatalogo, float $precio, string $nombreCientifico, string $nombreComun, string $habitat, string $continente) {
      parent::__construct($codigo, $anioAltaCatalogo, $precio, $nombreCientifico, $nombreComun, $habitat);
      $this->continente = $continente;
  }

  public function getContinente(): string {
      return $this->continente;
  }

  public function setPrecioPorContinente(): void {
      switch ($this->continente) {
          case "Europa":
              // precio base
              break;
          case "Africa":
          case "Asia":
              $this->setPrecio($this->getPrecio() * 1.15); // incremento del 15%
              break;
          case "America":
              $this->setPrecio($this->getPrecio() * 1.25); // incremento del 25%
              break;
          default:
              throw new InvalidArgumentException("Continente no válido");
      }
  }
}