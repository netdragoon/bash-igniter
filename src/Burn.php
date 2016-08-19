<?php
namespace BashIgniter;
use Symfony\Component\Console\Application as SymfonyConsole;

class Burn{
	public $pathApplication;
	private $symfonyConsole;

	public function __construct(){
		$this->symfonyConsole = new SymfonyConsole();
	}

	public function definePathApp($pathApp){
		$pathApplication = ((substr($pathApp, -1)) == "/") ? ($pathApp) : ($pathApp."/");
		define("pathApplication", $pathApplication);

		return 1;
	}

	public function toBurn(){
		$this->registerCommands();
	}

	private function registerCommands(){
		$this->symfonyConsole->add(new Command\CreateController());
		$this->symfonyConsole->add(new Command\CreateModel());
		$this->symfonyConsole->add(new Command\CreateView());
		$this->symfonyConsole->add(new Command\CreateHelper());
		//$this->symfonyConsole->add(new Command\CreateCore());
		$this->symfonyConsole->add(new Command\CreateRoute());
	}

	public function __destruct(){
		$this->symfonyConsole->run();
	}
}
?>