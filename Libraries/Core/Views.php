<?php 

	class Views

	{
		function getView($controller,$view,$data=""){

			$controller=get_class($controller);
			if (strtolower($controller) == "home")
			{
				$view = "View/".$view.".php";

			}else

			{
				$view = "View/".$controller."/".$view.".php";
			}

			require_once($view);
		}
	}

 ?>