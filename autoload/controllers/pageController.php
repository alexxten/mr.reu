<?php
namespace controllers;

class pageController
{
	public function mainPage($f3)
	{
		\views\pageView::main($f3);     
	}

    public function notFoundPage($f3)
	{
	   \views\pageView::Error404($f3);		
	}
}