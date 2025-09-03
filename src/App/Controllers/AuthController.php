<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Paths;
use Framework\TemplateEngine;

class AuthController {

    private TemplateEngine $templateEngine;

    public function __construct()
    {
        $this->templateEngine = new TemplateEngine(Paths::VIEW);
    }

    public function view() {
        $this->templateEngine->render("/dummy.php");
    }
}