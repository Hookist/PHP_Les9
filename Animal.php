<?php
    class Animal
    {
        public $name;
        const PI = 3.14;
        public $PI = 5;
        
        public function Say()
        {
            echo $this->name . " const PI = " . $this::PI;
            echo "<br>";
            
        }
        
        function __destruct()
        {
            echo "destructor";
        }
    }

    class Cat extends Animal
    {
        
    }

    $animal = new Cat();
    $animal->name = "gaben";
    $animal->Say();
    //unset($animal);

    foreach($animal as $value)
    {
        
        echo "<br>" . ($value) . "<br>" ;
    }

    class A
    {
        protected function Say()
        {
            echo "gg wp";
        }
    }

    class B extends A
    {
        
        public function BSay()
        {
            echo "BSay";
            parent::Say();
        }
    }
    
    class C extends B
    {
        public function CSay()
        {
            echo "CSay";
            parent::Say();
        }
    }
    
    $A = new C();
    $A->CSay();
   
    
    
?>