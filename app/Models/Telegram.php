<?php

namespace App\Models;

class Telegram
{
  const BOT_TOKEN = "1883949411:AAEX_elVhPsNIzowV-DcpE0GkoUoajEcxOQ";

  public static function sendNotification($chatId, $message){
    $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot".self::BOT_TOKEN."/sendMessage?chat_id={$chatId}&parse_mode=html&text={$message}");
  }

}
