<?php
$ip_file = 'current_ip.txt';
# Webhook jest używany do powiadamiania użytkownika poprzez Discorda o nowym IP.
# Gdy ip się nie zmienia nie zostanie wysłane, dopiero gdy adres ulegnie zmianie wysyła się wiadomość
$webhook_url = '__WEBHOOK_LINK__';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ip'])) {
    $ip = filter_var($_POST['ip'], FILTER_VALIDATE_IP);
    if ($ip) {
        $previous_ip = file_exists($ip_file) ? trim(file_get_contents($ip_file)) : '';

        if ($ip !== $previous_ip) {
            file_put_contents($ip_file, $ip);

            $data = json_encode([
                "content" => "🔔 Server IP has changed, new IP: `$ip`"
            ]);

            $ch = curl_init($webhook_url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);
        }

        echo "$ip";
    } else {
        http_response_code(400);
    }
    exit;
}

if (file_exists($ip_file)) {
    $ip = trim(file_get_contents($ip_file));
    echo "$ip";
}
?>
