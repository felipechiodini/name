<?php

namespace Felipechiodini\Name;

class Name
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getFirstName(): string
    {
        return explode(' ', $this->value)[0];
    }

    public function getLastName(): string
    {
        if ($this->isFull()) {
            $arr = explode(' ', $this->value);
            return $arr[count($arr) - 1];
        }

        throw new \Exception('Name doesnt has last name');
    }
   
    public function isFull(): bool
    {
        return count(explode(' ', $this->value)) > 1;
    }

    public function countNames(): int
    {
        return count(explode(' ', $this->value));
    }

    public function captalize(): string
    {
        $name = explode(' ', mb_strtolower($this->value));

        $ignore = [
            'de',
            'da',
            'das',
            'dos',
            'do',
            'e'
        ];

        for ($index = 0; $index < count($name); $index++) {
            if (!in_array($name[$index], $ignore)) $name[$index] = ucfirst($name[$index]);
        }

        return implode(' ', $name);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
