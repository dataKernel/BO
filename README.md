# BO
#Back office en attente des playlists stable


Voici les étapes nécessaires au bon fonctionnement de l’application:
1/CONFIGURATION SYSTEME:
- Checker sa configuration php.ini avec la commande php —ini, et bien vérifier que la valeur date.timezone n’est pas commentée et vaut « Europe/Paris ».
- Nous aurons besoin d’utiliser de nombreuse fois la commande php bin/console, je recommande de créer un alias plus court tel que:
- Aller ensuite à la racine du projet dans TestSM, et lancez la commande « sf assets:install ».
- Il faut aussi faire une update de bower avec bower update, que j’ai utilisé pour mettre à jour le jquerry de Sonata. Si bower n’est pas installé il est posible de l’initialiser à l’aide de NPM:
- Normalement le projet fonctionne très bien sans la commande: "composer update", car c’est un zip qui contient déjà toutes les dépendances à l’instar d’un GIT.
- Ensuite vous pouvez utiliser le serveur interne de Symfony ou utiliser apache/nginx. Pour de petits projets je vous conseille le serveur rapide, accessible avec: « sf server:start ».

- Si vous n’avez aucune erreur serveur en essayant d’accéder à l’adresse: http://127.0.0.1:8000/app_dev.php tout est correct. Vous devriez normalement voir cette erreur(c’est normal):



2/CONFIGURATION ORM:
- Assurez vous d’avoir un serveur SQL(quel que soit la distribution) qui tourne sur votre machine.
- Il faudra biensur configurer votre fichier parameters.yml dans le repertoire app, afin d’avoir une connexion à une base de donnée fonctionnelle(Vérifiez bien que toutes les données correspondent à votre configuration).
- Si vous ne voulez pas éditer le fichier, il faudra créer la base de donnée pour que Symfony puisse utiliser le serviceManager sur votre base de donnée. Voici comment faire simplement:
(j’ai renommé exprès mon fichier pour l’exemple car je ne peux pas dupliquer ma base, vous verrez bien Created database  catalog et non Catalogs).
- Je n’ai pas créé de homepage via l’url classique. Voici l’URL correspondante: http://127.0.0.1:8000/app_dev.php/catalog/home
   - Si vous avez un doute sur les routes existantes vous pourrez tout voir rapidement avec: « sf debug:router »
- Toute navigation est possible par la suite, sauf pour revenir sur le catalogue depuis le backOffice.
 

Je suis disponible si vous avez des questions, ou problèmes que j’ai oublié de mentionner. 
Cordialement.
