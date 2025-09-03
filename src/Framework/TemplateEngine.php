<?php

declare(strict_types=1);

namespace Framework;

use App\Config\Paths;

class TemplateEngine{

    public function __construct(private $basePath)
    {
        
    }

    public function render(string $path, array $data = []) {
        extract($data, EXTR_SKIP);

        ob_start();
        include($this->basePath . $path);
        $content = ob_get_contents();
        ob_end_clean();

        echo $content;
    }

    private function resolve(string $path, array $data = []) {
        extract($data, EXTR_SKIP);
        include $this->basePath . $path;
    }
}