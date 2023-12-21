# Nette Web Project

Projekt na základě PDF požadavků

## Used technologies

- PHP 8.0
- Composer
- Nette Sandbox
- Apache server (xampp)
- Mysql Database

## Setup
 <Testováno na Windows Sandbox>
 
- Instalace Xampp převážně kvůli Apache serveru a configu, verze 8.0.30. config-service and ports-Apache main port 8082
- Instalace MySQL Workbench a MySQL server, skrz konfigurátor si nastavíme jen heslo (důležité později do local.neon) v mém případě to bylo "Projekt2012", dále jsem nechal standard system account, grant full acces a bez sample databáze
- Poté si naklonujeme Projekt z github a vytvoříme si složku uvnitř xampp/htdocs s názvem Projekt, do které vložíme obsah z repository (Ne slozku Projekt_Urbitech... ale její soubory) a uvnitř našeho xampp/htdocs/Projekt ještě vytvoříme log složku
- Dále se vrhneme do MySQL Workbench a přípojíme se na náš server, poté zajdeme do Server/Data import, vybereme možnost Import from Self-Contained File, uděláme si new schema "projekt" které následně vybereme, vybereme sql soubor který se nachází v xampp\htdocs\Projekt\Important files a dáme start import
- Jako další se přesuneme do xampp\htdocs\Projekt\config kde si nastavíme local.neon soubor, nastavíme si heslo a databázi (scheme), v mém postupu vypadá takto:
  database:
    	dsn: 'mysql:host=127.0.0.1;dbname=projekt'
    	user: 'root'
    	password: 'Projekt2012'
- V tento moment už jen stačí zapnout Apache server skrz Xampp a přejít na adresu http://localhost/Projekt/www/home (či http://localhost:8082/Projekt/www/home skrz Linux z mého testování)

## Info
- Update funguje na bázi horního select boxu, update->none znamená že se záznam přidá. Pokud se vybere přímo nějaký autor nebo kniha, tak jsme v update části kodu (práce MainService). To znamená že jakékoliv pole kam něco napíšeme, tak se změní v to, co máme v dánem text boxu (kromě autora, ten se musí nastavit vždy), příklad:
  Name (ponecháme prázdné) Surname změníme, tak se nám pouze zmení Surname autora, Name zůstane nedotčené. Musel jsem použít tuto metodu, jelikož jsem spoustu času využil s prací AJAX který mě nefungoval. Bohužel jsem zapomněl přidat redirect takže aby uživatel uviděl výsledek musi znovu zadat url stránky.
- Funkce na kterých jsem pracoval ale nestihnul skrz komplikace byli Search a pagging.
- Dekuji za váš čas a přeji hezký zbytek dne. Atásek.

  **It is CRITICAL that whole `app/`, `config/`, `log/` and `temp/` directories are not accessible directly
  via a web browser. See [security warning](https://nette.org/security-warning).**
