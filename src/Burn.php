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
		
	}

	public function __destruct(){
		$this->symfonyConsole->run();
	}
}
?>