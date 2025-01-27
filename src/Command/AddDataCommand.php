<?php

// src/Command/AddDataCommand.php

namespace App\Command;

use App\Entity\Batiment;
use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Faker;

#[AsCommand(
    name: 'app:add-data',
    description: 'Adds sample data to the database'
)]
class AddDataCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $batiment = new Batiment();
            $batiment->setAdress($faker->address);
            $this->entityManager->persist($batiment);

            for ($j = 0; $j < 10; $j++) {
                $person = new Person();
                $person->setName($faker->firstName);
                $person->setLastName($faker->lastName);
                $person->setAdress($faker->address);
                $person->setBatiment($batiment);
                $this->entityManager->persist($person);
            }
        }

        $this->entityManager->flush();



        return Command::SUCCESS;
    }
}
