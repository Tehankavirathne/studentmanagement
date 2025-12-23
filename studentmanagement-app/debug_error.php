<?php

try {
    require __DIR__.'/vendor/autoload.php';
    $app = require_once __DIR__.'/bootstrap/app.php';
    
    // We need to bootstrap the application to trigger the service providers
    $kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    echo "App booted.\n";
} catch (\Throwable $e) {
    $log = "Exception: " . $e->getMessage() . "\n";
    $log .= "File: " . $e->getFile() . " on line " . $e->getLine() . "\n";
    $log .= "Stack trace:\n" . $e->getTraceAsString() . "\n";
    file_put_contents('debug_log.txt', $log);
    echo $log;
}
