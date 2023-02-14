<?php 
include 'vendor/autoload.php';
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;
use Vtiful\Kernel\Format;



$validator = Validation::createValidator();
$violations = $validator->validate('Bernhard', [ new Length(['min' => 10]),  new NotBlank(), ]);

if (0 !== count($violations)) {
    // there are errors, now you can show them
    foreach ($violations as $violation) {
        echo $violation->getMessage().'<br>';
    }
}
	$nw = new DateTime();
	$nw1 = new DateTime();
	echo gettype((int) $nw->format('Y'));
	echo "Hello php";
