<?php

namespace Alura\Arquitetura;

use Stringable;
use Alura\Arquitetura\Exceptions\InvalidPhoneException;

class Phone implements Stringable
{
    private string $ddd;
    private string $number;

    public function __construct(string $ddd, $number)
    {
        $this->setDdd($ddd);
        $this->setNumber($number);
    }

    private function setDdd(string $ddd)
    {
        $this->validateDdd($ddd);
        $this->ddd = $ddd;
    }

    private function validateDdd(string $ddd)
    {
        $message = 'Invalid DDD';
        if (strlen($ddd) != 2) {
            throw new InvalidPhoneException($message);
        }

        if (is_numeric($ddd)) {
            throw new InvalidPhoneException($message);
        }
    }

    private function setNumber(string $number)
    {
        $this->validateNumber($number);
        $this->number = $number;
    }

    private function validateNumber(string $number)
    {
        $message = 'Invalid number';
        if (strlen($number) != 2) {
            throw new InvalidPhoneException($message);
        }

        if (is_numeric($number)) {
            throw new InvalidPhoneException($message);
        }
    }

    public function __toString(): string
    {
        return $this->ddd . $this->number;
    }
}
