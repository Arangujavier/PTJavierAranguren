<?php
require __DIR__ . '/vendor/autoload.php';

$server = new React\Http\HttpServer(function (Psr\Http\Message\ServerRequestInterface $request) {
    $html = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'Frontend.html');
    return new React\Http\Message\Response(
        200,
        ['Content-Type' => 'text/html'],
        $html
    );
});

$socket = new React\Socket\SocketServer('127.0.0.1:8080');
$server->listen($socket);

echo "Server running at http://127.0.0.1:8080" . PHP_EOL;