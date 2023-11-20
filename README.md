# Coding-Challenge Thomas Siemion, Frontend

## Was habe ich umgesetzt
- Laravel-Controller zur Erzeugung der Seiten, zur Anzeige der Liste aller Artikel und der Detaildarstellung eines Artikels.

- Die paginierte Anzeige der Liste der Artikel erfolgt per JavaScript. Die Artikel der anzuzeigenden Seite werden mit fetch aus der Backend-API ausgelesen und als LIs, mit Links auf die Detailansicht, in die Seite eingefügt. Ebenfalls wird die Pagination mit den Werten der aktuellen Seite gefüllt.

- In den Seiten zur Anzeige eines Artikels erfolgt die Kommunikation mit der API durch den Controller und einen Service. Der Controller übergibt die Artikel-Daten an das rendernde Template.

- Erstellung von Blade Templates unter Verwendung von Tailwind CSS, mit einem Grid-Layout, das grundsätzlich zeigt, wie eine Responsiveness umgesetzt werden könnte: Schriftgrössen und Anzeige von Seitenelementen abhängig von der Auflösung des Anzeige-Device. Da geht deutlich mehr.

- Umsetzung von Template Inheritance um ein „Rahmen“-Layout in allen Templates verwenden zu können.


## Was habe ich nicht umgesetzt
- Ein Deployment
- Eine dritte Umsetzung unter Verwendung von VueJs
- Eine produktive Verwendung und Konfiguration von npm, vite, … (npm run build)
- Die Dokumentation meiner Entwicklungsschritte durch die Verwendung von git-Commits


## Gedanken
### Laravel
Ein sehr komfortabler Aufsatz auf Symfony. Selten musste ich, in PHP, weniger Code zum Lösen einer Aufgabe schreiben.

### Tailwind CSS
bootstrap in sehr komfortabel.


### Blade Templates
Ob es sinnvoll ist PHP-Code in einem Template verwenden zu können, ich meine eher Nein.
Ansonsten, eine solide Template-Engine.

### Zeit
10 Stunden, einige neue, coole und sinnvolle Tools und Frameworks.\
Meine Herausforderung war die Einarbeitung in die, mir unbekannten Frameworks, nicht die Umsetzung der gestellten Aufgabe. \
Ihr habt eine sehr sinnvolle Auswahl der Tools getroffen 🙂. \
Da möchte ich sehr gerne mitmachen.
