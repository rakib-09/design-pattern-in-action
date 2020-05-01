<?php
/**
 * Created by Anonymous
 * Date: 2/5/20
 * Time: 1:01 am
 */

//we usually use decorator pattern when inheritance is not an option to extend.
interface  Pizza{
    public function getDesc();

    public function cost();
}

class Margarita implements Pizza{

    public function getDesc()
    {
        return "margarita pizza";
    }

    public function cost()
    {
        return 299.00;
    }
}

class FarmHouse implements Pizza {

    public function getDesc()
    {
        echo "farm house Pizza \n";
    }

    public function cost()
    {
        return 499.00;
    }
}

class PizzaToppings implements Pizza {
    private $pizza;
    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getDesc()
    {
       return $this->pizza->getDesc();
    }

    public function cost()
    {
        return $this->pizza->cost();
    }
}

class ExtraCheese extends PizzaToppings {
    public function getDesc()
    {
        return parent::getDesc(). " extra cheese";
    }

    public function cost()
    {
        return parent::cost() + 20;
    }
}

class Jalapeno extends PizzaToppings {
    public function getDesc()
    {
        return parent::getDesc(). " Jalapeno";
    }

    public function cost()
    {
        return parent::cost() + 40;
    }
}

function makePizza(Pizza $pizza){
    echo "your order ". $pizza->getDesc();
}
function pizzaCost(Pizza $pizza) {
    echo "your order price". $pizza->cost();
}

$pizza = new Margarita();
$pizza = new ExtraCheese($pizza);
$pizza = new Jalapeno($pizza);

pizzaCost($pizza);