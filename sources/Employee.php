<?php

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class Employee
{
    public function  __construct(private int $id, private string $name,private float $salary,private DateTime $hireDate) 
    {
        $this->validate();
    }

    private function validate()
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate(
            [
                'id' => $this->id,
                'name' => $this->name,
                'salary' => $this->salary,
                'hireDate' => $this->hireDate,
            ],
            new Assert\Collection(
                [
                    'id' => [ #four digit for example
                        new Assert\LessThan(10000),
                        new Assert\GreaterThan(999),
                        new Assert\Type(['type' => 'integer'])
                    ],
                    'name' => [ #min name 'Ян' for example
                        new Assert\Length(['min' => 2, 'max' => 64]),
                        new Assert\NotBlank(),
                    ],
                    'salary' => [ #in dollars for example
                        new Assert\GreaterThan(100),
                        new Assert\Type(['type' => 'float'])
                    ], #in dollars
                    'hireDate' => [
                        new Assert\LessThanOrEqual(new DateTime())
                    ],
                ]
            )
        );
        if (count($violations) > 0) 
        {
            $message='';
            foreach ($violations as $violation) 
            {
                $message.= $violation->getMessage().'<br/>';
            }
            throw new InvalidArgumentException($message);
        }
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getSalary():float
    {
        return $this->salary;
    }

    public function getHireDate(): DateTime
    {
        return $this->hireDate;
    }

    public function Standing_years() : int
    {
        $now = new DateTime();
        if($now->format("n") > $this->hireDate->format("n"))
        {
            if($now->format("j") > $this->hireDate->format("j"))
            {
                return $now->format('Y') - $this->hireDate->format('Y');
            }
            else
            {
                return $now->format('Y') - $this->hireDate->format('Y') - 1;
            }
        }
        else
        {
            return $now->format('Y') - $this->hireDate->format('Y') - 1;
        }
        
    }
}
