<?php

namespace HseEvents\View;

use Exception;
use HseEvents\Config;
use Throwable;

class View
{
    private static ?View $instance = null;
    private string $templatePath;

    private function __construct(string $templatePath){
        $this->templatePath = $templatePath;
    }


    public static function getInstance(): View {
        if (is_null(self::$instance)) {
            self::$instance = new View(Config::getInstance()->templatePath);
        }

        return self::$instance;
    }

    public function renderError(Throwable $e): void {
        include $this->templatePath . 'errorLayout.phtml';
    }

    public function render(string $layout, string $templateView, ?array $data = null): void
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
                include $this->templatePath . $layout;
            } else {
                include $this->templatePath . "emptyPage.php";
            }
        } catch (Throwable $e) {
            ob_end_clean();
            $this->renderError($e);
        }

    }
}
