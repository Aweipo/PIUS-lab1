<?php

use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;
$employee_username_validate = [new Length(['min' =>3 ])];
$employee_id_validate = [new LessThan(10000),new GreaterThan(999)];