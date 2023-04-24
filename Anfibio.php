<?php
// Clase abstracta Anfibio
abstract class Anfibio {
    protected string $codigo;
    protected int $anioAltaCatalogo;
    protected float $precio;
    protected string $nombreCientifico;
    protected string $nombreComun;
    protected string $habitat;

    public function __construct(string $codigo, int $anioAltaCatalogo, float $precio, string $nombreCientifico, string $nombreComun, string $habitat) {
        $this->codigo = $codigo;
        $this->anioAltaCatalogo = $anioAltaCatalogo;
        $this->precio = $precio;
        $this->nombreCientifico = $nombreCientifico;
        $this->nombreComun = $nombreComun;
        $this->habitat = $habitat;
    }

    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getAnioAltaCatalogo(): int {
        return $this->anioAltaCatalogo;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function setPrecio(float $precio): void {
        $this->precio = $precio;
    }

    public function getNombreCientifico(): string {
        return $this->nombreCientifico;
    }

    public function getNombreComun(): string {
        return $this->nombreComun;
    }

    public function getHabitat(): string {
        return $this->habitat;
    }
}



?>
