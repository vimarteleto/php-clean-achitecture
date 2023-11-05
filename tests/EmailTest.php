<?php

namespace Alura\Arquitetura\Tests;

use Alura\Arquitetura\Email;
use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Exceptions\InvalidEmailException;

class EmailTest extends TestCase
{
    public function testEmailMustBeValid()
    {
        $this->expectException(InvalidEmailException::class);
        new Email('invalid email');
    }
}
