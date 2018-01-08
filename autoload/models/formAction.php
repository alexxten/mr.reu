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

	public static function doneSend($f3 ) // Не забудь указать аргументы необходимые
	{

        // Записать данные в БД

        // Отправить на мыло

		$to  = "emailaddress@example.com";
		$subject = "Мистер РЭУ - %ФИО%";
		$message = "<html><body>
					<p>ФИО: %ФИО%</p>
					<p>Телефон: %телефон%</p>
                    ...
					</body></html>";
      	
        $header = "From: Мистер-РЭУ <no-reply@example.com>\r\n"; 
		$header .= "Reply-To: no-reply@example.com\r\n"; 
        $header .= "Content-Type: text/html; charset=utf-8\r\n";
        
        mail($to,$subject,$message,$header);

        // Вызвать функцию из views, которая рендерит страницу "Вы успешно прошли регистрацию"
	}
}