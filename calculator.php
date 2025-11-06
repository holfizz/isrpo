<?php
class Calculator {
    private $num1;
    private $num2;
    
    public function __construct() {
        $this->num1 = 0;
        $this->num2 = 0;
    }
    
    public function showMenu() {
        echo "\n=== КАЛЬКУЛЯТОР ===\n";
        echo "1. Ввести два числа\n";
        echo "2. Выполнить сложение\n";
        echo "3. Выполнить вычитание\n";
        echo "4. Выполнить деление\n";
        echo "5. Возвести число в степень\n";
        echo "6. Выход\n";
        echo "Выберите пункт меню: ";
    }
    
    public function run() {
        while (true) {
            $this->showMenu();
            $choice = trim(fgets(STDIN));
            
            switch ($choice) {
                case '1':
                    $this->inputNumbers();
                    break;
                case '2':
                    echo "Результат сложения: " . $this->add() . "\n";
                    break;
                case '3':
                    echo "Результат вычитания: " . $this->subtract() . "\n";
                    break;
                case '4':
                    $result = $this->divide();
                    if ($result !== null) {
                        echo "Результат деления: " . $result . "\n";
                    }
                    break;
                case '5':
                    echo "Результат возведения в степень: " . $this->power() . "\n";
                    break;
                case '6':
                    echo "До свидания!\n";
                    return;
                default:
                    echo "Неверный выбор!\n";
            }
        }
    }
    
    private function inputNumbers() {
        echo "Введите первое число: ";
        $this->num1 = (float)trim(fgets(STDIN));
        echo "Введите второе число: ";
        $this->num2 = (float)trim(fgets(STDIN));
        echo "Числа сохранены: {$this->num1} и {$this->num2}\n";
    }
    
    private function add() {
        return $this->num1 + $this->num2;
    }
    
    private function subtract() {
        return $this->num1 - $this->num2;
    }
    
    private function divide() {
        if ($this->num2 == 0) {
            echo "Ошибка: деление на ноль!\n";
            return null;
        }
        return $this->num1 / $this->num2;
    }
    
    private function power() {
        return pow($this->num1, $this->num2);
    }
}

// Запуск калькулятора
$calculator = new Calculator();
$calculator->run();
?>