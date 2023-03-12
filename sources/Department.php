<?php

class Department
{
    public function  __construct(private array $workers, private string $name) 
    {
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getAmountOfWorkers()
    {
        return count($this->workers);
    }


    public function  summaryOfSalary():float
    {
        $sum =0;
        foreach($this->workers as $worker )
        {
            $sum = $sum + $worker->getSalary();
        }

        return $sum;
    }
}
