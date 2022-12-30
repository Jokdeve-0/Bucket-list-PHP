# bucket-list

## Description :
Application pour gérer la liste de vos souhaits.
### Technos : 
>
> PHP       : 7.4.26
>
> Symfony   : 5.4
>
> Doctrine  : 2.12
>
## Get started :
> Clonez le projet
## Configuration : 
>Créez un fichier '` .env.local `' à la racine et ajoutez une secrete key et  la configuration de la connexion à la BDD.

## Installation : 

### <span style="color:green">installer le projet et les dépendances : </span>
> composer install

### <span style="color:green">Creation de la base de données : </span>
> php bin/console doctrine:database:create

### <span style="color:green">Creation de migration :  </span>
> php bin/console make:migration


### <span style="color:green">Migrer : </span>
> php bin/console doctrine:migrations:migrate

## Conclusion :
 <span style="color:green">Let's Go !</span>

 ### Auteurs
> **Georges Ramos** _alias_ [@Jokdeve-Looper](https://github.com/Jokdeve-0)