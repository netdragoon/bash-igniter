<?php
namespace BashIgniter\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use BashIgniter\Manipulate\CreateManipulate;

class CreateController extends Command{
	protected function configure(){
		$this->setName("create:controller")
		->setDescription('Create new controller')
		->setHelp("This command is used to create new Controller");

		$this->addArgument('name', InputArgument::REQUIRED, 'The controller name');
	}

	protected function execute(InputInterface $input, OutputInterface $output){
		$name = $input->getArgument('name');

		$createManipulate = new CreateManipulate();
		$createManipulate->successCreate = "<info>Controller created with success!</info>";

		return $output->writeln($createManipulate->createController($name));
	}
}