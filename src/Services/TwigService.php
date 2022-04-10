<?php

declare(strict_types=1);
namespace App\Services;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class TwigService
{
    public const BASE_VIEW_DIR_NAME = "View";
    private static array $instances = [];
    private Environment $twig;


    public function __construct()
    {
        $templatesPath =  dirname(__DIR__) . DIRECTORY_SEPARATOR . self::BASE_VIEW_DIR_NAME;
        $loader = new FilesystemLoader($templatesPath, getcwd());
        $twig = new Environment($loader, [
            'cache' => false,
            'debug' => true
        ]);
        // On active le var_dump() de twig pour debugger
        $twig->addExtension(new DebugExtension());
        $this->twig = $twig;
    }

    /**
     * @return TwigService
     */
    public static function  getInstance():TwigService
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }

    /**
     * @return Environment
     */
    public function getTwig(): Environment
    {
        return $this->twig;
    }

}
