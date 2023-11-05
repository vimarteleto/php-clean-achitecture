<?php

namespace Alura\Arquitetura\Tests;

use Alura\Arquitetura\Cpf;
use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Exceptions\InvalidCpfException;

class CpfTest extends TestCase
{
    public function testCpfMustHaveElevenDigits()
    {
        $this->expectException(InvalidCpfException::class);
        new Cpf('123');
    }

    public function testCpfMustBeValid()
    {
        $this->expectException(InvalidCpfException::class);
        new Cpf('12345678900');
    }
}
