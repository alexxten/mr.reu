<?php
namespace views;

class pageView
{
	public static function main($f3)
	{
		$template = \Template::instance();
	
		// Сюда можно записать, какие переменные ты хочешь передать в index.html

		echo $template->render("index.html");
    }
}