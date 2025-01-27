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
        $batiment1 = new Batiment();
        $batiment1->setAdress('123 Main Street');

        $batiment2 = new Batiment();
        $batiment2->setAdress('456 Park Avenue');

        $person1 = new Person();
        $person1->setName('John');
        $person1->setLastName('Doe');
        $person1->setAdress('123 Main Street');
        $person1->setBatiment($batiment1);

        $person2 = new Person();
        $person2->setName('Jane');
        $person2->setLastName('Smith');
        $person2->setAdress('456 Park Avenue');
        $person2->setBatiment($batiment2);

        $this->entityManager->persist($batiment1);
        $this->entityManager->persist($batiment2);
        $this->entityManager->persist($person1);
        $this->entityManager->persist($person2);
        $this->entityManager->flush();

        $output->writeln('Simple data has been added to the database.');

        return Command::SUCCESS;
    }
}
