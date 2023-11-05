<?php

namespace Alura\Arquitetura;

use Stringable;
use Alura\Arquitetura\Exceptions\InvalidCpfException;

class Cpf implements Stringable
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        $this->setCpf($cpf);
    }

    public function __toString(): string
    {
        return $this->cpf;
    }

    private function setCpf(string $cpf)
    {
        $this->validateCpf($cpf);
        $this->cpf = $cpf;
    }

    private function validateCpf(string $cpf): void
    {
        $message = "Invalid CPF";
        if (strlen($cpf) != 11) {
            throw new InvalidCpfException($message);
        }

        if (is_numeric($cpf)) {
            throw new InvalidCpfException($message);
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new InvalidCpfException($message);
            }
        }
    }
}
