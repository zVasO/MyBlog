<?php

namespace App\Services;

class MessageService
{

    const ALERT_PRIMARY = "primary";
    const ALERT_SECONDARY = "secondary";
    const ALERT_SUCCESS = "success";
    const ALERT_DANGER = "danger";
    const ALERT_WARNING = "warning";
    const ALERT_INFO = "info";
    const ALERT_LIGHT = "light";
    const ALERT_DARK = "light";
    const MESSAGES = [
        self::ALERT_DANGER => "Une erreur est survenue",
    ];

    public function __construct()
    {
    }


    /**
     * retourne un message d'alert ou une chaine vide
     * @param string|null $typeAlert
     * @param string|null $message
     * @return string
     */
    public static function getMessage(string $typeAlert = null, string $message = null): string
    {
        //todo prendre le type alert et recupere le message grace au taleau en constantes
        //todo si message non null on garde le message au lieu de celui du tableau
        if ($message === null) {
            return '';
        }
        return "<div class=\"alert alert-" . $typeAlert . "\"role=\"alert\">" . $message . "</div>";
    }

}
