<?php
namespace controllers;

class mrPageController
{
	public function mainPage($f3)
	{
		\views\mrPageView::main($f3);     
	}

    public function notFoundPage($f3)
	{
	   \views\mrPageView::Error404($f3);		
	}
}