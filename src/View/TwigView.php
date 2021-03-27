<?php


namespace HseEvents\View;


class TwigView implements ViewInterface
{

    private \Twig\Environment $twig;

    /**
     * TwigView constructor.
     * @param \Twig\Environment $twig
     */
    public function __construct(\Twig\Environment $twig)
    {
        $this->twig = $twig;
    }


    public function render(string $template, array $data = []): string {
        return $this->twig->render($template, $data);
    }
}