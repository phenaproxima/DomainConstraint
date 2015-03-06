<?php

namespace phenaproxima\DomainConstraint;

use Symfony\Component\Validator\Constraint;

class Domain extends Constraint {

  public $message = '"%domain" is not a valid domain name.';

}
