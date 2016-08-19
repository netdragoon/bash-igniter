<?php
namespace BashIgniter\Manipulate;

use BashIgniter\Structure\PathStructure;
use BashIgniter\Manipulate\FileManipulate;
use BashIgniter\Structure\FileStructure;

class CreateManipulate extends PathStructure{
	public $errorExist = "<error>File just exist</error>";
	public $errorAdded = "<error>Error adding in the file</error>";
	public $successCreate;
	public $successAdded;

	private $fileStructure;
	private $fileManipulate;
	public function __construct(){
		$this->fileStructure = new FileStructure();
		$this->fileManipulate = new FileManipulate();
	}

	public function createController($name){
		$fileContent = $this->fileStructure->controller();

		$createFile = $this->fileManipulate->createFile($name, $fileContent, $this->pathController);

		if($createFile !== true)
			return $this->errorExist;

		return $this->successCreate;
	}

	public function createModel($name){
		$fileContent = $this->fileStructure->model();

		$createFile = $this->fileManipulate->createFile($name, $fileContent, $this->pathModel);

		if($createFile !== true)
			return $this->errorExist;

		return $this->successCreate;
	}

	public function createView($name, $type = false){
		$methodStructure = "view";
		if($type != false)
			$methodStructure .= ucfirst($type);

		$fileContent = $this->fileStructure->$methodStructure();

		$createFile = $this->fileManipulate->createFile($name, $fileContent, $this->pathView, false);

		if($createFile !== true)
			return $this->errorExist;

		return $this->successCreate;
	}

	public function createHelper($name){
		$fileContent = $this->fileStructure->helper();

		$createFile = $this->fileManipulate->createFile($name, $fileContent, $this->pathHelper);

		if($createFile !== true)
			return $this->errorExist;

		return $this->successCreate;
	}

	public function createCore($name, $extends = false, $prefix = false){
		$methodStructure = "core";
		if($extends != false)
			$methodStructure .= "Extend";


		$fileContent = $this->fileStructure->$methodStructure();

		$extendReplace = array();

		if($prefix != false)
			$extendReplace['CI'] = strtoupper($prefix);

		$extendReplace['REPLACE_EXTENDS'] = strtoupper($extends);

		$createFile = $this->fileManipulate->createFile($name, $fileContent, $this->pathCore, true, $extendReplace);

		if($createFile !== true)
			return $this->errorExist;

		return $this->successCreate;
	}

	public function createRoute($route, $controller){
		$fileContent = "\n$"."route['$route'] = '{$controller}';";

		$addedFile = $this->fileManipulate->addInFile($fileContent, $this->pathRoute);

		if($addedFile != true)
			return $this->errorAdded;

		return $this->successAdded;
	}
}