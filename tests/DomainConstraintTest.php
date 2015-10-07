<?php

namespace phenaproxima\DomainConstraint;

/**
 * @coversDefaultClass \phenaproxima\DomainConstraint\DomainValidator
 */
class DomainConstraintTest extends \PHPUnit_Framework_TestCase {

  /**
   * @covers ::isValid
   */
  public function test() {
    // At least two period-delimited segments.
    $this->assertFalse(DomainValidator::isValid('foo'));

    // Cannot start or end with a period.
    $this->assertFalse(DomainValidator::isValid('.foo.net'));
    $this->assertFalse(DomainValidator::isValid('foo.net.'));

    // No segment can exceed 63 characters.
    $this->assertFalse(DomainValidator::isValid($this->randString(64) . '.net'));

    // The entire thing cannot exceed 255 characters.
    $this->assertFalse(DomainValidator::isValid($this->randString(256) . '.net'));

    // A-Za-z0-9\- only.
    $this->assertFalse(DomainValidator::isValid('foo_baz.net'));

    // Segments cannot start or end with hyphens.
    $this->assertFalse(DomainValidator::isValid('foo-.net'));
    $this->assertFalse(DomainValidator::isValid('-baz.net'));

    // .baz is not a known TLD.
    $this->assertFalse(DomainValidator::isValid('foo.baz'));

    // And finally...a totally valid domain name.
    $this->assertTrue(DomainValidator::isValid('foo.net'));
  }

  /**
   * Generates a random string of lowercase ASCII characters.
   *
   * @param int $length
   *   Length of the string.
   *
   * @return string
   */
  protected function randString($length) {
    $string = '';
    for ($i = 0; $i < $length; $i++) {
      $string .= chr(rand(97, 122));
    }
    return $string;
  }

}
