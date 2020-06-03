<?php 
/*1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: 
продукт, ценник, посылка и т.п.
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).
4. Придумать наследников класса из п.1. Чем они будут отличаться?*/

class Product {
    public $id;
    public $title;
    public $decription;
    public $price;
    function __construct(int $id, string $title, string $decription, int $price){
        $this->id = $id;
        $this->title = $title;
        $this->decription = $decription;
        $this->price = $price;
    }
    function view(){
        echo "<img src=http://dummyimage.com/150/>";
        echo "<h1>{$this->title}</h1><p>{$this->decription}</p></br>Цена: {$this->price}</br>";
    }
}
//Класс наследник будет с информацией о количестве товара на складе
class ProductStore extends Product {
    public $count;
    function __construct(int $id, string $title, string $decription, int $price, int $count){
        parent::__construct($id, $title, $decription, $price);
        $this->count = $count;
    }
    function viewCount(){
        parent::view();
        echo "<p>Количество на складе: {$this->count}</p>";
    }
}
$a = new Product(1, 'Однобортный жакет', 'Этот однобортный жакет станет элементом делового или повседневного образа.', 2500);
$a->view();
$b = new ProductStore(2, 'Двубортный жакет', 'Этот однобортный жакет станет элементом делового или повседневного образа.', 3000, 5);
$b->viewCount();


class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); //1
$a2->foo(); //2
$a1->foo(); //3
$a2->foo(); //4
//объекты а1 и а2 принадлежат к одному классу - А => к х последовательно прибавляют единицу


class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo();  //1
$a1->foo();  //2
$b1->foo(); //2
// объекты а1 и b1 принадлежат к разным классам => к х последовательно прибавляют единицу для каждого класса отдельно
// 7* Вроде идентичный коду выше, работает также
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 
