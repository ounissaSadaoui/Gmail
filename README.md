# Création d'un "clone" de Gmail:
## Première étape: Création d'une version statique de la page:
* on commence par la page d'acceuil, elle doit ressembler à ceci:
![Image du résultat attendu](./asset/page_accueil.png) 
* La page de connexion sera celle-ci: 
![Image page connexion](./asset/page_connexion.png) 
* Quand à la page de création de compte, ça sera celle-ci:
![Image création compte](./asset/page_creation.png)

On commence par la mise en place du code HTML de la page.
on utilise une navbar pour les boutons de navigation du haut de la page, ainsi que des références aux différentes sections avec des balises comme celle-ci:
```html
            <a href="#home_page"><img src="./asset/mail.png" alt="icone d'acceuil gmail">Gmail</a>

```
* Passons au css de la page:
Une fois le squelette html prêt, on peut commencer à mettre en forme en css.
je vais au début tout mettre dans une même page "main.css"
ou il y a aura un reset, puis un thème
