<?php

namespace Alura\Arquitetura;

use Stringable;
use Alura\Arquitetura\Exceptions\InvalidEmailException;

class Email implements Stringable
{
    private string $email;

    public function __construct(string $email)
    {
        $this->setEmail($email);
    }

    private function setEmail(string $email)
    {
        $this->validateEmail($email);
        $this->email = $email;
    }

    private function validateEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException("Invalid email");
        }
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
