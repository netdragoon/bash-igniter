<?php
namespace BashIgniter\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use BashIgniter\Manipulate\CreateManipulate;

class CreateModel extends Command{

	protected function configure(){
		$this->setName("create:model")
		->setDescription('Create new Model')
		->setHelp("This command is used to create new Model");

		$this->addArgument('name', InputArgument::REQUIRED, 'The model name');
	}

	protected function execute(InputInterface $input, OutputInterface $output){
		$name = $input->getArgument('name');

		$createManipulate = new CreateManipulate();
		$createManipulate->successCreate = "<info>Model created with success!</info>";

		return $output->writeln($createManipulate->createModel($name));
	}

}