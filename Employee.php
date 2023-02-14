<?php

class Employee{
    private int $_id;
    private string $_name;
    private float $_salary;
    private DateTime $_hire_date;


    public function Employee(int $id,string $name,float $salary,DateTime $hire_date){
        $_id = $id;
        $_name = $name;
        $_salary = $salary;
        $_hire_date = $hire_date;
    }

    public function Standing_years(){
        $now = new DateTime();
        return (int) $now->format('y') - (int) $this->_hire_date->format('y');
    }
}   