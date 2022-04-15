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
        if ($message === null) {
            return '';
        }
        return "<div class=\"alert alert-" . $typeAlert . "\"role=\"alert\">" . $message . "</div>";
    }

}
