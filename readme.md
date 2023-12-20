# Nette Web Project

Projekt na základě PDF požadavků

## Used technologies

- PHP 8.0
- Composer
- Nette Sandbox
- Apache server (xampp)
- Mysql Database

## Setup

- Instalace MySQL client (default port)
- instalace Xampp (Apache port 8082, Manage servers->Apache web server->configure->Port = 8082)
- Nahrani mysql souboru do databaze
- Klonovat projekt z githubu do htdocs(Nejlepe si udelat slozku a klonovat do ni, v mem pripade to je slozka "Projekt" takze local url je pote http://localhost:8082/Projekt/www/home)
- Spusteni xampp (apache)
- Zadani http://localhost:8082/Projekt/www/home do prohlizece
- Update funguje na bazi horniho select boxu, update->none znamena ze se zaznam prida, pokud se vybere primo nejaky autor nebo kniha, tak jsme v update casti kodu. To znamena ze jakekoliv pole kam neco napiseme, tak se zmeni v to co mame v danem text boxu, priklad:
  Name (nechame prazdne) Surname zmenime, tak se nam pouze zmeni Surname autora, Name zustane nedotcene.
- Funkce na kterych jsem pracoval ale nestihnul skrz komplikace byli Search a pagging.
- Dekuji za vas cas a preji hezky zbytek dne

  **It is CRITICAL that whole `app/`, `config/`, `log/` and `temp/` directories are not accessible directly
  via a web browser. See [security warning](https://nette.org/security-warning).**
