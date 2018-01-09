<?php
namespace models;

class mrFormAction{ 
    public static function errorSend($f3, $code, $text) 
	{  
		$f3->set('codeError', $code);
		$f3->set('textError', $text);
		\views\mrPageView::main($f3);
	}

	public static function doneSend($f3, $data) 
	{
		$folderName = md5(microtime()); 
		$dir = "/home/s/slink21/mister_reu/public_html/ui/misters/$folderName/"; 
		mkdir($dir); 

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
			10=> json_encode($jsonPathPhoto)                  	     
		));
		
		
		$images = "";
		foreach($jsonPathPhoto as $value)
		{
			$images .= "<img src=\"http://mister.the-center.it/$value\" width=\"50%\">";
		}

		
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
					<p>Фотографии :</p>  $images
					</body></html>";
      	
        $header = "From: Мистер-РЭУ <no-reply@mister.the-center.it>\r\n"; 
		$header .= "Reply-To: no-reply@mister.the-center.it\r\n"; 
		$header .= "Content-Type: text/html; charset=utf-8\r\n";
		
		if ( mail($to,$subject,$message,$header)) {\views\mrPageView::done($f3);}
		else {\mrFormAction::errorSend($f3, 1,'Произошла ошибка при отправке данных. Попробуйте снова');}

	}
}