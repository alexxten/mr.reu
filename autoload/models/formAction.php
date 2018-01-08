<?php
namespace models;

class formAction{ 
    public static function errorSend($f3, $code, $text) // Не забудь указать аргументы необходимые (код ошибки, текст)
	{  
		$f3->set('codeError', $code);
		$f3->set('textError', $text);
		\views\pageView::main($f3);

		//echo $text;
        // Вызвать функцию из views, которая рендерит страницу с регистрацией.
        // В этой странице должно быть предусмотрено поле для вывода текста ошибки
	}

	public static function doneSend($f3, $data) // Не забудь указать аргументы необходимые
	{
		$folderName = md5(microtime()); // Берет время в миллисекундах и хэширует MD5
		$dir = "/home/s/slink21/mister_reu/public_html/ui/misters/$folderName/"; // В переменную dir записываем название нашей новой директории
		mkdir($dir); // Создаём дирекорию

		$jsonPathPhoto = array();
		
		foreach ($data[photo] as $key => &$value) 
		{
			$info = new \SplFileInfo($value[name]);
			move_uploaded_file($value[tmp_name], $dir."$key.".$info->getExtension());
			$jsonPathPhoto[$key] = "ui/misters/$folderName/$key.".$info->getExtension();
		}
		unset($value);

		$f3->get('DB')->exec('INSERT INTO `users`(`id`, `fio`, `kurs`, `fakultet`, `phone`, `vklink`, `height`, `hobbies`, `mr_reu_2018`, `photo`) VALUES (?,?,?,?,?,?,?,?,?,?)', 
		array(
            1=> NULL, 
			2=> $data[fio],
			3=> $data[kurs],
			4=> $data[fakultet],
			5=> $data[phone],
			6=> $data[vklink],
			7=> $data[height],
			8=> $data[hobbies],
			9=> $data[mr_reu_2018],
			10=> json_encode($jsonPathPhoto)                 // Передать json 	     
		));
		
		// Записать данные в БД
		$images = "";
		foreach($jsonPathPhoto as $value)
		{
			$images .= "<img src=\"http://mister.the-center.it/$value\">";
		}

		// Отправить на мыло
		$to  = "1399selena@gmail.com";
		$subject = "Мистер РЭУ - $data[fio]";
		$message = "<html><body>
					<p>ФИО: $data[fio]</p>
					<p>Курс: $data[kurs]</p>
					<p>Факультет: $data[fakultet]</p>
					<p>Телефон: $data[phone]</p>
					<p>Ссылка вк: $data[vklink]</p>
					<p>Рост: $data[height]</p>
					<p>Чем занимался (занимается), хобби: $data[hobbies]</p>
					<p>Что нужно, чтобы стать Мистером РЭУ-2018?: $data[mr_reu_2018]</p>
					<p>Фотографии : $images</p>
					</body></html>";
      	
        $header = "From: Мистер-РЭУ <no-reply@mister.the-center.it>\r\n"; 
		$header .= "Reply-To: no-reply@mister.the-center.it\r\n"; 
		$header .= "Content-Type: text/html; charset=utf-8\r\n";
		
		if ( mail($to,$subject,$message,$header)) {\views\pageView::done($f3);}
		else {\formAction::errorSend($f3, 1,'Произошла ошибка при отправке данных. Попробуйте снова');}

		// Вызвать функцию из views, которая рендерит страницу "Вы успешно прошли регистрацию"
		// как получать изображение из инпутов
	}
}