<?php
namespace controllers;

class pageController
{
	public function mainPage($f3)
	{
		\views\pageView::main($f3);

        // Сделать проверку на то, подошла регистрация к концу или нет.
        // Если нет, выдать страницу с регистрацией, если да, то выдать страницу "Регистрация окончена"
	}

    public function notFoundPage($f3)
	{
        // Выдать страницу "Страница не найдена / Error 404"		
	}
}