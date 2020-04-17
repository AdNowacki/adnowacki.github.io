# Chroma Blog

* Pobierz repozytorium
* Wejdź do katalogu projektu i w terminalu doinstaluj potrzebne paczki
```bash 
npm install
```
* Po instalacji uruchom w terminalu polecenie
```bash
gulp
```
* Po wykonaniu pracy przez `gulpa` struktura projektu powinna wyglądać następująco:
```javascript
app/
|-- dist/
  |-- less-important-style.css
  |-- less-important-style.production.css
  // mniej ważne style wczytywane na końcu strony
  |-- main.js
  |-- main.min.js
  |-- style.css
  |-- style.production.css
  // ważne style wczytywane w sekcji head
|-- images/
|-- src/
  |-- js/
    |-- main.js
  |-- scss/
    |-- css/
      |-- bootstrap.min.scss
      |-- bootstrap-theme.min.scss
      |-- config.json
    |-- parts/
      |-- _mixins.scss
      |-- _reset.scss
      |-- _vars.scss
    |-- less-important-style.scss
    |-- style.scss
|-- views/
  |-- article.php
  |-- category.php
  |-- main.php
  |-- search.php
|-- .htaccess
|-- index.php
|-- manifest.json
|-- node_modules
|-- .gitignore
|-- gulpfile.js
|-- package.json
|-- package-lock.json
|-- README.md
```

`dist` - katalog wynikowy, tu znajdują się już wersje produkcyjne potrzebnych plików
`images` - katalog z assetami produkcyjnymi
`src` - katalog deweloperski, tu znajdują się pliki robocze
`views` - katalog z rozbitymi na osobne pliki widokami stron