<?php

namespace App\Tests\Entity;

use App\Entity\Person;
use App\Entity\Batiment;
use PHPUnit\Framework\TestCase;

class BatimentTest extends TestCase
{
    public function testBatiment(): void
    {
        $batiment = new Batiment();
        $batiment->setAdress('5 rue de la paix');
        $batiment->addPerson(new Person());
        $this->assertInstanceOf(Person::class, $batiment->getPerson()->first());
        $batiment->removePerson(new Person());
        $this->assertEmpty($batiment->getPerson());
        $this->assertEquals('5 rue de la paix', $batiment->getAdress());
    }
}
