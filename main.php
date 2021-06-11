<?php


//абстрактный класс животные
abstract class animal
{
    static $id = 1;
    public $idAnimal;

    public abstract function getProduct();

    public function getAnimal()
    {
        return static::class;
    }
}

class chicken extends animal
{
    function __construct()
    {
        $this->idAnimal = parent::$id++;
    }
    //получаем кол-во продукции
    public function getProduct()
    {
        return rand(0, 1);
    }
}

class cow extends animal
{
    function __construct()
    {
        $this->idAnimal = parent::$id++;
    }
    //получаем кол-во продукции
    public function getProduct()
    {
        return rand(8, 12);
    }
}

class FarmFactory
{
    //регистрация куриц
    public function createChicken()
    {
        $chicken = new chicken();
        return $chicken;
    }
    //регистрация коров
    public function createCow()
    {
        $cow = new cow();
        return $cow;
    }
}




class Farm
{
    public function get(){
        $milk=0;
        $egg=0;
        $farm = new FarmFactory();
        $a = array();
        for ($i = 1; $i <= 10; $i++) {
            $a[] = $farm->createCow();
        }
        for ($i = 1; $i <= 20; $i++) {
            $a[] = $farm->createChicken();
        }
        foreach ($a as $value){
            switch ($value->getAnimal()) {
                case "App\Http\Controllers\cow":
                    $milk +=$value->getProduct();
                    break;
                case "App\Http\Controllers\chicken":
                    $egg +=$value->getProduct();
                    break;
            }
        }
        echo "Молоко: ".$milk." л. <br>";
        echo "Яйца: ".$egg." шт.<br>";
    }
}
