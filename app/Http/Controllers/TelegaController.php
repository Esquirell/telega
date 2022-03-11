<?php

namespace App\Http\Controllers;

use AurimasNiekis\FFI\TdLib;
use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegaController extends Controller
{
    public function ky()
    {
        $MadelineProto = new \danog\MadelineProto\API('hello');
        $MadelineProto->start();

        $settings = array(
            'peer' => '@typical_dnepr1', //название_канала, должно начинаться с @, например @breakingmash
            'offset_id' => 0,
            'offset_date' => 0,
            'add_offset' => 0,
            'limit' => 2, //Количество постов, которые вернет клиент
            'max_id' => 0, //Максимальный id поста
            'min_id' => 0, //Минимальный id поста - использую для пагинации, при  0 возвращаются последние посты.
            //'hash' => []
        );

        $response = $MadelineProto->messages->getHistory($settings);
        dd($response);

        $settings = [
            'app_info' => [ // Эти данные мы получили после регистрации приложения на https://my.telegram.org
                'api_id' => '10802683',
                'api_hash' => '7733a15649728e60ac9b650c252f366c',
            ],
            'logger' => [ // Вывод сообщений и ошибок
                'logger' => 3, // выводим сообещения через echo
                'logger_level' => 4, // выводим только критические ошибки.
            ],
            'serialization' => [
                'serialization_interval' => 300,
                //Очищать файл сессии от некритичных данных.
                //Значительно снижает потребление памяти при интенсивном использовании, но может вызывать проблемы
                'cleanup_before_serialization' => true,
            ],
        ];

        $MadelineProto = new \danog\MadelineProto\API('session.madeline', $settings);
        $MadelineProto->start();

        dd();


        $keyboard = [
            ['Корик', 'Коврик', 'Корек'],
        ];

        $reply_markup = Keyboard::make([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);


        $response = Telegram::sendMessage([
            'chat_id' => '1133757027',
            'text' => 'Как правильно?',
            'reply_markup' => $reply_markup
        ]);

        $messageId = $response->getMessageId();

    }
}
