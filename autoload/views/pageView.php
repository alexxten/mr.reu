<?php
namespace views;

class pageView
{
	public static function main($f3)
	{
		$template = \Template::instance();
		echo $template->render("index.html");
	}
	
	public static function done($f3)
	{
		$template = \Template::instance();
		echo $template->render("done.html");
	}

	public static function Error404($f3)
	{
		$template = \Template::instance();
		echo $template->render("404.html");
	}
}