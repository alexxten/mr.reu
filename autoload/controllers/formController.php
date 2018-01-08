<?php
namespace controllers;

class formController{
    public function sendData($f3)
	{
        // Так получать данные, присланные методом POST. Угадай, как получать данные методом GET :)
      

        // Так доводим строку до вида, который не навредит нам
        // $name = trim(htmlspecialchars(stripslashes($name)));

        $data = $f3->get('POST');
        foreach ($data as $key => &$value)
        {
            $value = trim(htmlspecialchars(stripslashes($value)));
        }
        unset($value);

        if ( mb_strlen($data[fio])<1 ) {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле ФИО ") ;}
        elseif ( mb_strlen($data[kurs])<1 ) {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле Курс ") ;}
        elseif ( mb_strlen($data[fakultet])<1 ) {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле  Факультет ") ;}
        elseif ( mb_strlen($data[phone])<1 ) {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле  Телефон ") ;}
        elseif ( mb_strlen($data[vklink])<1 ) {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле  Ссылка вк ") ;}
        elseif ( mb_strlen($data[height])<1 ) {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле  Рост ") ;}
        elseif ( mb_strlen($data[hobbies])<1 ) {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле  Чем занимался (занимается), хобби ") ;}
        elseif ( mb_strlen($data[mr_reu_2018])<1 ) {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле  Что нужно, чтобы стать Мистером РЭУ-2018? ") ;}
        elseif ( mb_strlen($data[fio])>256 ) {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле ФИО  ") ;}
        elseif ( mb_strlen($data[kurs])>256 ) {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Курс  ") ;}
        elseif ( mb_strlen($data[fakultet])>256 ) {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Факультет  ") ;}
        elseif ( mb_strlen($data[phone])>256 ) {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Телефон ") ;}
        elseif ( mb_strlen($data[vklink])>256 ) {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Ссылка вк ") ;}
        elseif ( mb_strlen($data[height])>256 ) {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Рост ") ;}
        elseif ( mb_strlen($data[hobbies])>1024 ) {\models\formAction::errorSend($f3, 1, "Вы ввели больше 1024 символов в поле Чем занимался (занимается), хобби ") ;}
        elseif ( mb_strlen($data[mr_reu_2018])>1024 ) {\models\formAction::errorSend($f3, 1, "Вы ввели больше 1024 символов в поле Что нужно, чтобы стать Мистером РЭУ-2018? ") ;}
        else {\models\formAction::errorSend($f3, 1, "Все окк");}
        


        /* echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        // Тут пишем условия проверки всех входных данных.
        // Если данные не прошли проверку, отправляем текст ошибки в функцию ошибки из models
        // Будет круто, если каждое поле будешь проверять в отдельном elseif и выдавать текст ошибки для каждого из полей
        // Если данные прошли все проверки, вызвать функцию успешной отправки из models

        /*Array
        (
            [fio] => Иванов Иван
            [kurs] => 1
            [fakultet] => ФМЭСИ
            [phone] => 1234
            [vklink] => 3434
            [height] => 232
            [hobbies] => вооллала
            [mr_reu_2018] => авроплв
            [photo] => алалалалв
            [sign_up] => Регистрация
        )*/
	}
}