<?php
$envFile = __DIR__ . '/.env';
if (!file_exists($envFile)) {
    die(".env file not found\n");
}

$lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$env = [];
foreach ($lines as $line) {
    if (strpos($line, '=') !== false && substr($line, 0, 1) !== '#') {
        list($key, $value) = explode('=', $line, 2);
        $env[trim($key)] = trim($value);
    }
}

$host = $env['DB_HOST'] ?? '127.0.0.1';
$port = $env['DB_PORT'] ?? 3306;
$username = $env['DB_USERNAME'] ?? 'root';
$password = $env['DB_PASSWORD'] ?? '';
$database = $env['DB_DATABASE'] ?? 'laravel';

echo "Attempting PDO connection to mysql:host=$host;port=$port;dbname=$database user=$username...\n";

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5, // Set a low timeout
    ];
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Connected successfully to database '$database'\n";
    
    // Try a simple query
    $stmt = $pdo->query("SELECT 1");
    echo "Query result: " . $stmt->fetchColumn() . "\n";
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
