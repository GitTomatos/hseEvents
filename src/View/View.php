<?php

namespace HseEvents\View;

use Exception;

class View
{
    public function render(string $layout, string $templateView, ?array $data = null): void
    {
        $filename = "../templates/$templateView";
        echo "<br>" . $filename;

        try {

            if (is_file($filename)) {
                if (is_array($data)) {
                    extract($data);
                }
                ob_start();
                include $filename;
                $content = ob_get_clean();
                include "../templates/$layout";
            } else {
                include "../templates/emptyPage.php";
            }
        } catch (Exception $e) {
            ob_end_clean();
            include '../templates/errorLayout.phtml';
        }

    }
}

?>