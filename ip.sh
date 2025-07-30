# Podaj tutaj link do strony WWW, gdzie wrzuciłeś plik ip.php
API_URL="__LINK_FOR_WEBSITE_WITH_PHP_API__"

IP=$(curl -s https://api.ipify.org)

curl -s -X POST -d "ip=$IP" "$API_URL"