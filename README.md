# IPWatchdog
Proste API, które zwraca aktualne IP sieci WAN.

> [!IMPORTANT]
> W razie problemów, zapraszam do kontaktu poprzez Discorda
> https://discord.gg/9dw6dbwgJY

## Instalacja:
1. Pobierz skrypt z repozytorium
2. Wrzuć plik `ip.php` na serwer WWW
3. Ustaw adres w polu `API_URL` w pliku `ip.sh` (Przykład: https://example.com/ip.php)
4. Przejdź do pliku `ip.php`, ustaw webhooka Discord, do powiadomień o nowym IP
5. Uruchom skrypt, aby sprawdzić czy wszystko poprawnie działa:
```
bash ip.sh
```
6. Jeżeli przyszła wiadomość na Discordzie, sprawdź czy wyświetla się twój adres WAN na serwerze WWW.
7. Gotowe!

## Automatyzacja, aby skrypt wykonywał się co godzinę:
1. Wykonaj komendę (modyfikując ścieżki lokalne):
```
sudo chmod +x ip.sh
sudo (crontab -l 2>/dev/null | grep -v '/home/ip/ip.sh'; echo "0 * * * * '/home/ip/ip.sh >/dev/null 2>&1") | crontab -
```
2. Sprawdź efekt automatyzacji:
```
crontab -l
```
3. Powinieneś zobaczyć coś takiego:
```
0 * * * * /home/ip/ip.sh >/dev/null 2>&1
```
- Gotowe! Teraz skrypt, będzie się wykonywał co godzinę!
