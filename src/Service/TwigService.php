<?php

declare(strict_types=1);
namespace App\Service;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class TwigService
{
    public const BASE_VIEW_DIR_NAME = "View";
    private Environment $twig;
    public function __construct()
    {
        $templatesPath =  dirname(__DIR__) . DIRECTORY_SEPARATOR . self::BASE_VIEW_DIR_NAME;
        $loader = new FilesystemLoader($templatesPath);
        $twig = new Environment($loader, [
            'cache' => false,
            'debug' => true
        ]);
        // On active le var_dump() de twig pour debugger
        $twig->addExtension(new DebugExtension());
        $this->twig = $twig;
    }

    /**
     * @return Environment
     */
    public function getTwig(): Environment
    {
        return $this->twig;
    }

}
