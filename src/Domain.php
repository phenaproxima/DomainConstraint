<?php

namespace phenaproxima\DomainConstraint;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Domain extends Constraint {

  public $message = '"%domain" is not a valid domain name.';

}
