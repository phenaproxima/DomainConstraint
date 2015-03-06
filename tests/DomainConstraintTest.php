<?php

namespace phenaproxima\DomainConstraint;

class DomainConstraintTest extends \PHPUnit_Framework_TestCase {

  public function test() {
    // .baz is not a known TLD.
    $this->assertFalse(DomainValidator::isValid('foo.baz'));
    // A totally valid domain name.
    $this->assertTrue(DomainValidator::isValid('foo.net'));
  }

}
