<?php
use App\Core\Routes;

require_once __DIR__ . '/App/Core/Sessions.php';
require_once __DIR__ . '/App/Model/Usuario.php';
require_once __DIR__ . '/App/Core/Config.php';
require_once __DIR__ . '/App/Core/Database.php';
require_once __DIR__ . '/App/Core/Routes.php';
require_once __DIR__ . '/App/Controllers/Usuario.php';
require_once __DIR__ . '/App/Controllers/Login.php';

new Routes();
