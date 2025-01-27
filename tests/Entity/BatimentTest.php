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
        $person = new Person("John", "Doe", "5 rue de la paix");
        $batiment->setAdress('5 rue de la paix');
        $batiment->addPerson($person);
        $this->assertInstanceOf(Person::class, $batiment->getPerson()->first());
        $batiment->removePerson($person);
        $this->assertEquals(0, $batiment->getPerson()->count());
        $this->assertEquals('5 rue de la paix', $batiment->getAdress());
    }
}
