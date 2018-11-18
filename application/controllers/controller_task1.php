<?php

class Controller_Task1 extends Controller
{

	function action_index()
	{
		$this->view->generate('task1_view.php', 'template_view.php');
	}
}
