<?php

namespace Alura\Arquitetura;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;

    public function addPhoneNumber(string $ddd, string $number)
    {
        $this->phones[] = new Phone($ddd, $number);
    }
}
