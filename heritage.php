<?php 

// base.html.twig
class Maman {
    // block
    public function getNom() {
        return "Je suis la maman" . PHP_EOL;
    }
}

// index.html.twig (extends base.html.twig)
class Enfant extends Maman {

    // block
    public function getNom() {
        return parent::getNom() . "Je suis l'enfant" . PHP_EOL;
    }
}

$enfant = new Enfant();
echo $enfant->getNom();