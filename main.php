<?php 

require_once('vendor/autoload.php');


    #Variant 2
    #Task 2.1
    $myEmp = new Employee(1111,'Dave',100.01,new DateTime('2007-12-01')); #Correct user
	echo $myEmp->Standing_years().'<br/>'; #working of my method

    try{
        $myEmp = new Employee(111,'D',10.01,new DateTime('2030-01-01')); #Incorrect user with mistakes in all fields

    } catch(InvalidArgumentException $exc){
        echo $exc->getMessage(); #Show errors messages
    }

    echo '---Another user--'.'<br/>';
    try{
        $myEmp = new Employee(11111,'I want max mark',1000,new DateTime('2020-01-01')); #Another incorrect user with 5-digit id

    } catch(InvalidArgumentException $exc){
        echo $exc->getMessage(); #Show errors messages
    }

    #Task 2.2
    $dep1 = [
        new Employee(1000,"Ave",120,new DateTime()),
        new Employee(1001,"Adam",130,new DateTime()),
        new Employee(1002,"Arnold",145,new DateTime()),
    ];
    $dep2 = [
        new Employee(1003,"Bob",220,new DateTime()),
        new Employee(1004,"Biba",200,new DateTime()),
        new Employee(1005,"Boblin",245,new DateTime()),
        new Employee(1006,"Bolt",220,new DateTime()),
        new Employee(1007,"Bernard",210,new DateTime()),
        new Employee(1008,"Beatrice",225,new DateTime()),
    ];
    $dep3 = [
        new Employee(1009,"Colt",190,new DateTime()),
        new Employee(1010,"Corner",190,new DateTime()),
        new Employee(1011,"Citra",215,new DateTime()),
        new Employee(1012,"Cobold",210,new DateTime()),
    ];

    $specDep = [
        new Employee(1003,"Bob",320,new DateTime()),
        new Employee(1005,"Boblin",245,new DateTime()),
        new Employee(1006,"Bolt",220,new DateTime()),
        new Employee(1007,"Bernard",310,new DateTime()),
        new Employee(1008,"Beatrice",225,new DateTime()),
    ];

    $departments=[
        new Department($dep1,'juniors'),
        new Department($dep2,'middles'),
        new Department($dep3,'analytics'),
        new Department($dep1,'juniors2'), #indent to juniors but another name
        new Department($specDep,'middles2'), #salary equal to middles but less peapoles
    ];


    $min = [$departments[0]];
    $max = [$departments[0]];
    for($i=1;$i<count($departments);$i++){
        if ($departments[$i]->summaryOfSalary() == $max[0]->summaryOfSalary()) {
            if($departments[$i]->getAmountOfWorkers() > $max[0]->getAmountOfWorkers()){
                $max = [$departments[$i]];
            }
            if($departments[$i]->getAmountOfWorkers() == $max[0]->getAmountOfWorkers()){
                $max[count($max)] = $departments[$i];
            }
        }
        if ($departments[$i]->summaryOfSalary() > $max[0]->summaryOfSalary()) {
            $max = [$departments[$i]];
        }
        if ($departments[$i]->summaryOfSalary() == $min[0]->summaryOfSalary()) {
            if($departments[$i]->getAmountOfWorkers() > $min[0]->getAmountOfWorkers()){
                $min = [$departments[$i]];
            }
            if($departments[$i]->getAmountOfWorkers() == $min[0]->getAmountOfWorkers()){
                $min[count($min)] = $departments[$i];
            }
        }
        if ($departments[$i]->summaryOfSalary() < $min[0]->summaryOfSalary()) {
            $min = [$departments[$i]];
        }
    }

    echo "Min salary"."<br/>";
    foreach($min as $m){
        echo $m->getName()."<br/>";
    }

    echo "Max salary"."<br/>";
    foreach($max as $m){
        echo $m->getName()."<br/>";;
    }



