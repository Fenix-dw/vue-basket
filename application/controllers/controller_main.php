<?php 
use application\controllers\CurencyController;
use application\core\Controller;

class Controller_Main extends Controller
{	
		
	function action_index()
	{	
		$this->view->generate('main_view.php');
	}
}