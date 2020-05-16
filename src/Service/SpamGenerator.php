<?php


namespace App\Service;


class SpamGenerator
{
    public function getSpamMessage()
    {
        $messages = [
            'Votre message ne semble pas cohérent !',
            'Merci de le vérifier et de le reformuler !',
        ];
        $index = array_rand($messages);
        return $messages[$index];
    }
}