<?php

namespace Base;

class View
{
    private $templatePath = '';
    private $data = [];

    public function __construct()
    {
        $this->templatePath = PROJECT_ROOT_DIR . DIRECTORY_SEPARATOR . 'app/View';
    }

    public function assign(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function render(string $tpl, $pattern = 1, $data = []): string
    {
        $this->data += $data;
        if ($pattern === RENDER_TYPE_NATIVE) {
            ob_start();
            include $this->templatePath . DIRECTORY_SEPARATOR . $tpl . '.phtml';
            return ob_get_clean();
        } else {
            $loader = new \Twig\Loader\FilesystemLoader('../App/View/');
            $twig = new \Twig\Environment($loader, array(
                'cache' => 'cache',
                'auto_reload' => true,
            ));
            return $twig->render($tpl . '.html.twig', $this->data);
        }
    }

    public function __get($varName)
    {
        return $this->data[$varName] ?? null;
    }
}
