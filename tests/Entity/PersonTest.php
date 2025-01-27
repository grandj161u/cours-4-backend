<?php

namespace App\tests\Entity;

use App\Entity\Person;
use App\Entity\Batiment;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testPerson(): void
    {
        $person = new Person();
        $person->setName('John');
        $person->setLastName('Doe');
        $person->setAdress('5 rue de la paix');
        $person->setBatiment(new Batiment());
        $this->assertEquals('John', $person->getName());
        $this->assertEquals('Doe', $person->getLastName());
        $this->assertEquals('5 rue de la paix', $person->getAdress());
        $this->assertInstanceOf(Batiment::class, $person->getBatiment());
    }
}
