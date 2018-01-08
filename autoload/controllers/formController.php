<?php
namespace controllers;

class formController{
    
    private static function reArrayFiles(&$file_post) {
        $file_array = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
    
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_array[$i][$key] = $file_post[$key][$i];
            }
        }
    
        return $file_array;
    }
    
    public function sendData($f3)
	{
        $data = $f3->get('POST');
        $files = formController::reArrayFiles($f3->get('FILES.photo'));

        foreach ($data as $key => &$value)
        {
            if ($key!='photo')
            {
                $value = trim(htmlspecialchars(stripslashes($value)));
            }
        }
        unset($value);

        $data[photo] = $files;

        if     (mb_strlen($data[fio]) < 1)              {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле ФИО") ;}
        elseif (mb_strlen($data[kurs]) < 1)             {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле Курс") ;}
        elseif (mb_strlen($data[fakultet]) < 1)         {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле Факультет") ;}
        elseif (mb_strlen($data[phone]) < 1)            {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле Телефон") ;}
        elseif (mb_strlen($data[vklink]) < 1)           {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле Ссылка ВК") ;}
        elseif (mb_strlen($data[height]) < 1)           {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле Рост") ;}
        elseif (mb_strlen($data[hobbies]) < 1)          {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле Чем занимался (занимается), хобби") ;}
        elseif (mb_strlen($data[mr_reu_2018]) < 1)      {\models\formAction::errorSend($f3, 1, "Вы не заполнили поле Что нужно, чтобы стать Мистером РЭУ-2018?") ;}
        elseif (mb_strlen($data[fio]) > 256)            {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле ФИО") ;}
        elseif (mb_strlen($data[kurs]) > 256)           {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Курс") ;}
        elseif (mb_strlen($data[fakultet]) > 256)       {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Факультет") ;}
        elseif (mb_strlen($data[phone]) > 256)          {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Телефон") ;}
        elseif (mb_strlen($data[vklink]) > 256)         {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Ссылка ВК") ;}
        elseif (mb_strlen($data[height]) > 256)         {\models\formAction::errorSend($f3, 1, "Вы ввели больше 256 символов в поле Рост") ;}
        elseif (mb_strlen($data[hobbies]) > 1024)       {\models\formAction::errorSend($f3, 1, "Вы ввели больше 1024 символов в поле Чем занимался (занимается), хобби") ;}
        elseif (mb_strlen($data[mr_reu_2018]) > 1024)   {\models\formAction::errorSend($f3, 1, "Вы ввели больше 1024 символов в поле Что нужно, чтобы стать Мистером РЭУ-2018?") ;}
        elseif (count($data[photo]) < 3)                {\models\formAction::errorSend($f3, 1, "Вы загрузили меньше 3-х фотографий") ;}
        elseif (count($data[photo]) > 5)                {\models\formAction::errorSend($f3, 1, "Вы загрузили больше 5-и фотографий") ;}
        else {\models\formAction::doneSend($f3, $data);}
        
        /*echo "<pre>";
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