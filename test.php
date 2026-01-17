<?php
// Simple Cloud SQL (MySQL) test: Unix socket (Cloud Run) OR TCP (Auth Proxy)

// Required env:
// DB_NAME, DB_USER, DB_PASS
// Option A (Cloud Run / Unix socket): INSTANCE_CONNECTION_NAME=project:region:instance
// Option B (TCP): DB_HOST=127.0.0.1, DB_PORT=3306

$db   = getenv('DB_NAME') ?: 'wordpress';
$user = getenv('DB_USER') ?: 'son';
$pass = getenv('DB_PASS') ?: 'Admin123@';

$instance = getenv('INSTANCE_CONNECTION_NAME') ?: '34.142.198.11' ; // project:region:instance
$host     = getenv('DB_HOST') ?: '127.0.0.1';
$port     = getenv('DB_PORT') ?: '3306';

if ($db === '' || $user === '') {
  http_response_code(500);
  exit("Missing DB_NAME or DB_USER\n");
}

$dsn = $instance
  ? "mysql:unix_socket=/cloudsql/$instance;dbname=$db;charset=utf8mb4"
  : "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

try {
  $pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  ]);

  $row = $pdo->query("SELECT NOW() AS now, VERSION() AS version")
             ->fetch(PDO::FETCH_ASSOC);

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode([
    'ok'      => true,
    'mode'    => $instance ? 'unix_socket' : 'tcp',
    'now'     => $row['now'] ?? null,
    'version' => $row['version'] ?? null,
  ], JSON_PRETTY_PRINT);

} catch (Throwable $e) {
  http_response_code(500);
  echo "ERROR: " . $e->getMessage() . "\n";
}
