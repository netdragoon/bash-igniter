<?php
namespace BashIgniter\Structure;

class PathStructure{
	protected $pathApplication = pathApplication.'application/';

	protected $pathController = pathApplication.'application/controllers/';
	protected $pathModel = pathApplication.'application/models/';
	protected $pathView = pathApplication.'application/views/';
	protected $pathHelper = pathApplication.'application/helpers/';
	protected $pathCore = pathApplication.'application/core/';

	protected $pathRoute = pathApplication.'application/config/routes.php';
}