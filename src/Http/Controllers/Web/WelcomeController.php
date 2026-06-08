<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use Strux\Component\Http\Controller\Web\Controller;
use Strux\Component\Http\Response;
use Strux\Component\Routing\Attributes\Route;
use Strux\Support\Bridge\Config;

class WelcomeController extends Controller
{
    #[Route(path: '/', methods: ['GET'], name: 'welcome')]
    public function index(): Response
    {
        return $this->view('welcome', [
            'version' => Config::get('app.version'),
            'controller_path' => 'src/Http/Controllers/Web/WelcomeController.php',
            'view_path' => 'templates/welcome.php'
        ]);
    }
}
