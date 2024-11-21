<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require 'src/Bot.php';
require 'src/Currency.php';

$bot = new Bot();
$currency = new Currency();

$update = json_decode(file_get_contents('php://input'));

if (isset($update)) {
    $message = $update->message;
    $from_id = $message->from->id;
    $chatId = $message->chat->id;
    $text = $message->text;
    $user_name = $message->from->username;

    if ($text == '/start') {

        $bot->saveUser($from_id, $user_name);
        $reply_keyboard = [
            'keyboard' => [
                [
                    ['text' => 'Ob havo'],
                    ['text' => 'Valyuta'],
                ]
            ],
            'resize_keyboard' => true, // Optional: Adjusts keyboard size
        ];
        $response = $bot->makeRequest('sendMessage', [
            'chat_id' => $from_id,
            'text'=>"Hello World! <a href='https://core.telegram.org/bots/api#message'> dcndsjcjsd</a>",
            'parse_mode' => 'html',
            'reply_markup' => $reply_keyboard
        ]);

        if (!$response->ok) {
            $bot->makeRequest('sendMessage', [
                'chat_id' => $from_id,
                'text'=>json_encode($response),
            ]);
        }
    }
    if ($text == 'Ob havo') {

    }
    if ($text == 'Valyuta') {

    }
    if ($text == '/currency') {
        $currencies = $currency->getCurrencies();

        $currency_list = "";
        foreach ($currencies as $currency => $rate) {
            $currency_list .= $currency . ": " . $rate . "\n";
        }
        $bot->makeRequest('sendMessage', [
            'chat_id' => $from_id,
            'text'=>$currency_list,
        ]);
    }
}


echo 'Ishladi';
