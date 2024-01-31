<?php
class Fruit {
  // Properties
    private $name;
    private $color;

// constructor
    function __construct($nom, $couleur) {
        $this->name = $nom;
        $this->color = $couleur;
    }
//Destructor
    function __destruct() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
  }

  // Methods
  /*function set_name($name) {
    $this->name = $name;
  }*/
  function get_name() {
    return $this->name;
  }
  /*function set_color($color) {
    $this->color = $color;
  }*/
  function get_color() {
    return $this->color;
  }
}

/*$apple = new Fruit();
$apple->set_name('Apple');
$apple->set_color('Red');
echo "Name: " . $apple->get_name();
echo "<br>";
echo "Color: " . $apple->get_color();*/

$banana = new Fruit("Banana","Jaune");
echo "Name: " . $banana->get_name(). "<br>";
echo "Color: " . $banana->get_color()."<br>";

?>