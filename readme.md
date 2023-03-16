# Projekt für die Bewerbung für eine fachpraktische Ausbildung

## Einleitung

Im Jahre 2018 bekam ich von einem Bekannten den Auftrag ein einfaches crud System zu bauen. Genauer gesagt ging es um 
eine Auflistung seines Inventars in der Tiefkühltruhe.

Nach Umsetzung wurde direkt nach einem Einkaufszettel gefragt mit folgenden Anforderungen: 

- Filtern nach Shop und Kategorien
- sortieren nach Kategorie, Laden und Namen
- Gebinde Arten festlegen
- Druckfunktion
- Archiv Funktionen
- Übertrag in die Tiefkühltruhe

Der Code befindet sich im Unterordner "shoplist 1.0"

Auf der Codeseite wurde gesetzt auf:
- OOP
- MVC Prinzip
- Router 

Dieser Code ist seit 2013 im Dauereinsatz und hat sich bewährt.

Aktuell steht ein rework des Codes an und im Ordner "Shoplist 2.0" befindet sich der aktuelle Entwicklungsstand.

Die Anforderungen sind geblieben.
Auf Code Seite wurde auf Folgendes gesetzt:
- OOP
- Repository Design Pattern
- Middleware
- Router mit freier Belegung der URL
- Datenbankklasse mit simplem Query-builder
- Modulentwicklung

Im Folgenden möchte ich Ihnen meine Gedanken zum neuen Code mitteilen

## Router

Ein großer Nachteil des alten Routers war es, dass es nach einem sehr starren System gearbeitet hat.
Wenn folgende URL gegeben ist:
> example.com/user/profile/35

Dann wurde folgende Parameter generiert
> Controller: User

> Methode: profile

> Param: 35


Es war nicht möglich in mehreren Ordnern zu arbeiten, noch eine gewisse Flexibilität durch Module zu erarbeiten.
Eine `HTTP METHOD` Abfrage war nicht möglich

Nach vielen Überlegungen wurde der Router komplett neu gebaut. 

Im ersten Schritt wurde eine Config mit allen Modulen angelegt, die sich in Ordnern in Ordner App sich befindet.

Um eine Flexibilität zu erreichen, wird in jeden Modul eine `routes.php` angelegt. In dieser Datei werden alle Routen 
das Modul definiert.

`$this->add('/shop/settings', 'Einkauf\Shop\Controller\MainSettings', 'GET');`

- Der erste Parameter legt die URL fest
- Der zweite Parameter legt den Namespace des Controllers fest
- Der dritte Parameter legt die HTTP METHOD fest
- Der letzte Parameter ist optional und legt in einem Array die Middlewares fest

Im aktuellen Projekt wird keine App Middleware benötigt. 
Des wird nur eine Middleware aufgerufen, die die GET/POST Variablen säubert


## Design Pattern

Beim neuen Projekt wird Konsequenz auf das Repository Design Pattern gesetzt. 
Dabei wird das System erweitert durch Service Dateien.
Folgende Aufgaben wurden vergeben:
- **Controller** -> Ruft verschiedene Service Dateien auf und bekommt bool oder int zurück, dann wird enschieden, ob es ein Reponse gibt oder mit einer Flashmessage an eine andere URL übergeben wird
- **Service** -> Geschäftslogik
- **Repository** -> Schnittstelle zwischen Geschäftslogik und der Datenbank. Gibt die Daten in Form von Objekten zurück
- **Model** -> Objekte, nahe der Datenbankstruktur mit Getter Setter Methoden
- **Middleware** -> Wird vor dem Controller geladen
- **Response** -> Templates


## Query-Builder

Hier gibt es meinen ersten Versuch für einen Query-Builder
Ein Aufruf könnte so aussehen
$dbResult = $db->select(['EinkaufArticle.id', 'EinkaufArticle.anzahl', 'EinkaufArticle.name', 'EinkaufBundle.name as bundle', 'EinkaufCat.name as cat', 'EinkaufShop.name as shop'])

->join('EinkaufBundle', 'EinkaufArticle.bundle_id = EinkaufBundle.id')

->join('EinkaufShop', 'EinkaufArticle.shop_id = EinkaufShop.id')

->join('EinkaufCat', 'EinkaufArticle.cat_id = EinkaufCat.id')

->run();

Für folgende SQL Befehle wurden Methoden angelegt:
- Select
- Insert
- Update
- Delete
- Join
- WHERE
- LIMIT
- OFFSET
- ORDERBY


# Learnings

Ich stehe am Anfang meiner Laufbahn als Entwickler und habe zwischen den zwei Projekten einen großen Sprung gemacht und alleine bei der Erstellung von Shoplist 2.0
habe ich folgende Ideen, wie ich den Code verbessern könnte:
- Beim Querybuilder komplett auf Prepared Statements verzichten. Darum soll sich die Klasse kümmern
- Callbacks über Session
- Die Models viel näher an die Datenbankstruktur bringen und bei Join über traits die weiteren Informationen einbinden. 
- Für die Config ENV Variablen nutzen
- Composer fürs Autoloading

Wenn die Zeit neben der Schule es zulässt, werde ich das Projekt neu Aufsetzen und die Learings einarbeiten. 
Allerdings hielt ich es für interessant Ihnen meinen aktuellen Stand mitzuteilen.