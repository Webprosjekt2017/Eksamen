# PRO101 Webprosjekt [![Build Status](https://travis-ci.org/Webprosjekt2017/Eksamen.svg?branch=master)](https://travis-ci.org/Webprosjekt2017/Eksamen) [![Code Climate](https://codeclimate.com/github/Webprosjekt2017/Eksamen/badges/gpa.svg)](https://codeclimate.com/github/Webprosjekt2017/Eksamen) [![Issue Count](https://codeclimate.com/github/Webprosjekt2017/Eksamen/badges/issue_count.svg)](https://codeclimate.com/github/Webprosjekt2017/Eksamen) [![Test Coverage](https://codeclimate.com/github/Webprosjekt2017/Eksamen/badges/coverage.svg)](https://codeclimate.com/github/Webprosjekt2017/Eksamen/coverage)   

__Utlevering:__ 23. februar 2017  
__Innlevering:__ 28. mai 2017 kl. 23.55 via its learning  
__Tillatte hjelpemidler:__ Alle  

### Oppgavetekst  
Westerdals Oslo ACT har campus tre ulike steder i Oslo sentrum (Campus Fjerdingen, Campus
Vulkan og Brenneriveien). For både studenter og ansatte er flere av disse stedene nye og mange
kjenner lite til hvilken tilbud for finnes i nærmiljøet (eks. spisesteder, treningsmuligheter, butikker
etc.). Med dette som utgangspunkt skal dere utvikle en webside – hvor hensikten er å «sette fokus
på nærmiljøet» og de tilbudene som her finnes. Dere velger selv hvilke av campusene dere ønsker
å fokusere på. Før dere går i gang med utviklingsarbeidet, diskuter målgruppen for løsningen
(behov/ønsker), hvilket innhold og tjenester websiden skal tilby, designvalg/visuelt uttrykk og bruk
av teknologi. Prøv også å finne noe «unikt» ved nettopp deres løsning – en slags «added value».
Tenk kreativt og nytt! Før dere går i gang med det tekniske utviklingsarbeidet skal dere utvikle en
digital prototype – slik at dere har en felles forståelse for konseptet og websiden som skal utvikles.

### Tekniske krav til løsningen
- Websiden skal bestå av én hovedside og minimum fire undersider
- Designet skal være brukervennlig, følge gjeldene prinsipper og tilpasset målgruppen
- Websiden skal kommunisere med en database og dere skal gjøre bruk av PHP
- Databasen skal inneholde minst to tabeller og én fremmednøkkel
- Det skal gjøres minst én spørring til hver tabell
- Bruk flere PHP-filer og importer de ved bruk av enten require eller namespaces/autoload
- Ha minst én PHP-fil som importeres av hver side (f.eks. header.php eller footer.php)
- Koden skal lastes opp på et eksternt GitHub repository
- Vis at dere har tenkt på kravene til universell utforming (WCAG) ved å legge til rette for også de med nedsatt funksjonsevne
- Koden skal være ryddig og lettleselig, med konsis indentering, samt kommentarer hvor det er nødvendig og god mappestruktur

### Krav til dokumentasjon (innhold i prosjektrapporten)
- En beskrivelsen av ideen og konseptet til løsningen dere har utviklet
- En beskrivelse av hvordan dere benyttet Kanban (agile utviklingsmetode) i prosjektet. Hva fungerte godt og hva fungerte mindre godt?
- Lenke til en video der dere gir en innføring i valgt støtteverktøy for bruk av Kanban i deres prosjekt
- En beskrivelsen av prototypen som ble utviklet i starten av prosjektet, pluss selve prototypen
- En beskrivelsen av hvordan brukernes (målgruppens) interesser og behov er ivaretatt i løsningen. Fokuser på brukskvalitet (Usability), designprinsipper, universell utforming, innhold/tjenester og designvalg/visuelt uttrykk, samt andre ting som dere mener har vært relevant i utviklingsprosessen
- Bruk av Git skal dokumenteres ved bruk av Punch card- og Contributors-graf. Eksempelvis gjennom skjermdumper (screenshots av grafer) eller annen logg av Git-historikk
- Ellers skal rapporten være ryddig, godt strukturert og lett å lese. Den skal også ha en innholdsfortegnelse (se mal på emnesiden)

### Ting som trekker opp leveransen (ikke krav)
- Bruk av composer og tredjepartspakker
- Støtte i flere nettlesere (CSS browser prefixes)
- Bruk av unit tester
- Bruk av code coverage med PHPUnit
- Bruk av Javascript for å gjøre websiden mer dynamisk

---

### Gulp

Gulp er en module(plugin) for NodeJS - npm. I dette tilfelle bruker vi det for å autocompilere pug også kjent som jade og sass/cscc. Gulp bir oss også browser-reload når vi gjør noen endringer. Det er opp til en self om en ønsker å bruke pug og/eller sass/scss. Skulle en ønske å kun bruke vanlig html og css er det bare å holde seg til './src' mappen. Uansett om du bruker sass/scss og pug eller ikke er gulp enkelt å få installert, og brwoser-reload funksjonen er ytterst behagelig å jobbe med.

__Mer info:__
 - [Node-js](https://nodejs.org/en/ "Node-js Home Page")
 - [Gulp-js](http://gulpjs.com/ "Gulp-js Home Page")
 - [Pug2](https://pugjs.org/api/migration-v2.html "Pug homepage --> migrating to Pug2")
 - [SASS/SCSS Syntax](http://sass-lang.com/guide#topic-2 "Sass homepage --> learn")

---

# DOCS

 - [Temp Docs](https://docs.google.com/document/d/1Nas6qm5GDvWzBiRSA3gR-isIURLapuoTQo1HsbZeTQA/edit?ts=58d3b103)
