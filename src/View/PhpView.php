<?php

namespace HseEvents\View;

use HseEvents\Registry;
use Throwable;

class PhpView implements ViewInterface
{
    private string $templatePath;

    public function __construct(string $templatePath){
        $this->templatePath = $templatePath;
    }


    public function renderError(Throwable $e): string {
        ob_start();
        include $this->templatePath . 'errorLayout.phtml';
        return ob_get_clean();
    }

    public function render(string $templateView, array $data = []): string
    {
        $filename = $this->templatePath . $templateView;
//        echo "<br>" . $filename;

        try {

            if (is_file($filename)) {
                if (is_array($data)) {
                    extract($data);
                }
                ob_start();
                include $filename;
                $content = ob_get_clean();
                ob_start();
                include $this->templatePath . "layout.twig";
                return ob_get_clean();
            } else {
                ob_start();
                include $this->templatePath . "emptyPage.php";
                return ob_get_clean();
            }
        } catch (Throwable $e) {
            ob_end_clean();
            return $this->renderError($e);
        }

    }
}
