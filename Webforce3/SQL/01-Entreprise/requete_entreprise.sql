-- *********** --
-- GÉNÉRALITÉS --
-- *********** --

-- Pour faire les requêtes sql, nous uilisons la console sous xampp :
--    cd c:\xampp\mysql\bin
--    mysql.exe -u root --password

-- Le sql n'est pas sensible à la casse, mais par convention, on met tout les mots-clés SQL en MAJUSCULES


-- ****************** --
-- Requêtes générales --
-- ****************** --

CREATE DATABASE entreprise; -- crée une base de données appelée "entreprise"
USE entreprise;             -- pour se connecter à la base de données "entreprise"
SHOW DATABASES;             -- affiche les bdd disponibles dans le SGBD;

-- Ne pas saisir dans la console

DROP DATABASE entreprise;   -- supprime définitivement la base de donnée "entreprise"
DROP TABLE employes;        -- supprime définitivement la table "employés"
TRUNCATE employes;          -- vide la table "employés"

-- on va créer la table "employés" et la remplir via la console

SHOW TABLES;      -- liste les tables de la bdd sur laquelle on est connecté (ici entreprise)
DESC employes;    -- affiche la structure de la table "employés"


-- ********************* --
-- Requêtes de SÉLÉCTION --
-- ********************* --

SELECT nom, prenom FROM employes;   -- affiche le nom et le prenom de tout les employés contenus dans la table
SELECT service FROM employes;

-- DISTINCT --
SELECT DISTINCT service FROM employes; --DISTINCT permet d'éliminer les doublons dans la reqiête de sélections : on affiche ainsi la liste précise des services

-- All ou * --
  SELECT * FROM employes; -- affiche tout les champs des employes; cette requête permet d'afficher l'intégralité d'une table

-- clause WHERE --
SELECT nom, prenom FROM employes WHERE service = 'informatique';    -- affiche le nom et le prénom des employés du service informatique. Notez que 'informatique' est une valeur passée entre quotes.

-- BETWEEN --
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31';  -- Affiche le nom, prénom et date_embauche des salariés embauchés entre 2006 et 2010

-- LIKE --
SELECT prenom FROM employes WHERE prenom LIKE 's%';    -- Le pourcent est un caractère joker qui remplace tout les autres caractères, on affiche donc le prénom des employés qui commence par 's'
SELECT prenom FROM employes WHERE prenom LIKE '%-%';

-- OPÉRATEURS DE COMPARAISON --
SELECT nom, prenom FROM employes WHERE service != 'informatique'; -- affiche le nom et prénom des employés qui ne sont pas du service informatique
--    =
--    <
--    >
--    <=
--    >=
--    != ou <> pour différent de

SELECT DISTINCT service FROM employes WHERE salaire > 3000;

-- ORDER BY --
SELECT nom, prenom, salaire FROM employes ORDER BY salaire;   -- Je trie mes employés via leur salaire (ordre croissant par défaut)
SELECT nom, prenom, salaire FROM employes ORDER BY salaire ASC, prenom DESC;    -- ASC pour ordre croissant; DESC = décroissant

-- LIMIT --
SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;
-- affiche nom prenom salaire de l'employé ayant le salaire le plus élevé:
    -- 1. On classe les employés par ordre décroissant
    -- 2. On sélectionne le premier enregistrement (x,y)
          -- x = nombre de lignes séléctionnées
          -- y = rang de l'élément sélectionné

-- L'alias avec AS --
SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes; -- AS permet de donner une étiquette au calcul salaire * 12; appelée alias

-- SUM --
SELECT SUM(salaire*12) FROM employes;   -- affiche la somme des salaires multipliés par 12 mois

-- MIN ET MAX --
SELECT MIN(salaire) FROM employes;
SELECT MAX(salaire) FROM employes;

SELECT prenom, nom, MIN(salaire) FROM employes;   -- Ceci ne fonctionne pas, on obtient le plus petit salaire mais les premiers prenom et nom de la table ! (cf ci-dessus 'limites')

-- La moyenne AVG (average)  --
SELECT AVG(salaire) FROM employes;

-- ROUND --
SELECT ROUND (AVG(salaire),0) FROM employes;    -- Arrondi la moyenne des salaire à 0 chiffre après la virgule

-- Count --
SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f';

-- IN --
SELECT nom, prenom, service FROM employes WHERE service IN ('comptabilite', 'informatique');

-- NOT IN --
SELECT nom, prenom, service FROM employes WHERE service NOT IN ('comptabilite', 'informatique');

-- AND, OR --
SELECT * FROM employes WHERE service = 'commercial' AND salaire <= 2000;

SELECT * FROM employes WHERE service = 'production' AND salaire = 1900 OR salaire = 2300;
-- Est équivalent à l'instruction suivante
SELECT * FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300;

-- GROUP BY --
SELECT service, COUNT(id_employes) FROM employes GROUP BY service;    --affiche le nombre d'employés par service : GROUP BY est utilisé avec COUNT, SUM, AVG, pour regrouper leur résultat selon le champ définit

-- GROUP BY ... HAVING --
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1;


-- ******************** --
-- Requêtes d'INSERTION --
-- ******************** --

SELECT * FROM employes;

INSERT INTO employes(id_employes, prenom, nom, sexe, service, date_embauche, salaire)
  VALUES (8059, 'Alexis', 'Richy', 'm', 'informatique', '2011-12-28', 1800);

-- Une insertion avec auto-incrémentation : on ne spécifie pas le champ id_employes qui s'incrémente tout seul:
INSERT INTO employes( prenom, nom, sexe, service, date_embauche, salaire)
  VALUES ('Alexis', 'Richy', 'm', 'informatique', '2011-12-28', 1800);

INSERT INTO employes VALUES(8061, 'test', 'test', 'm', 'informatique', '2010-01-28', 1800, 'valeur en trop');
-- On peut ne pas spécifier les champs lors d'une insertion, à condition de spécifier une valeur pour TOUS et dans l'ordre de présence dans la table ; ici, 'en  trop' n'est pas spécifié dans la table, la requête n'est donc pas valable
INSERT INTO employes VALUES(8062, 'test', 'test', 'm', 'informatique', '2010-01-28', 1800);


-- ************************ --
-- Requêtes de modification --
-- ************************ --

SELECT * FROM employes;

-- UPDATE --
UPDATE employes SET salaire = 1870 WHERE nom = 'cottet';    -- modifie le salaire à 1870 de l'employé de nom 'Cottet'

-- On privilégie généralement l'id de l'employé pour être plus précis et éviter les erreurs
UPDATE employes SET salaire = 1870 WHERE id_employes = '699';

UPDATE employes SET salaire = 1871, service = 'autres' WHERE id_employes = '699';   -- on peut modifier plusieurs champs dans la même requête
-- !! un UPDATE sans clause WHERE modifierait toute la table !! --

-- REPLACE --
REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire)
  VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2600);
-- le replace se comporte dans un premier temps comme un insert car l'id n'existe pas encore

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire)
  VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2601);
-- ici, le replace se comporte comme un update car l'id_employes '2000' est déja définie

-- *********************** --
-- Requêtes de suppression --
-- *********************** --

-- DELETE --
DELETE FROM employes WHERE nom = 'lagarde';
-- !! un DELETE sans clause WHERE supprimerait toute la table !! --

DELETE FROM employes WHERE service = 'informatique' AND id_employes != 802;

DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990;
-- on supprime les deux employés grâce au OR, en effet celui ci ne peut pas avoir deux id

DELETE FROM employes WHERE id_employes IN(388,990);


-- ******** --
-- EXERCICE --
-- ******** --

-- 1. Afficher le service de l'employé 547
  SELECT service FROM employes WHERE id_employes = 547;

-- 2. Afficher la date d'embauche d'amandine
SELECT date_embauche FROM employes WHERE prenom = 'amandine';

-- 3. Afficher le nombre d'employés du service commercial
  SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

-- 4. Afficher la somme des salaires annuels des commerciaux
  SELECT SUM(salaire*12) FROM employes WHERE service = 'commercial';

-- 5. Afficher le salaire moyen par service
  SELECT service, AVG(salaire) FROM employes GROUP BY service;

-- 6. Afficher le nombre de recrutements sur l'année 2010
  SELECT COUNT(date_embauche) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

-- 7. Augmenter le salaire de tous les employés de +100
  UPDATE employes SET salaire = (salaire + 100);

-- 8. Afficher le nombre de services différents
  SELECT COUNT(DISTINCT service) FROM employes;

-- 9. Afficher le nombre d'employés par service
  SELECT service, COUNT(id_employes) FROM employes GROUP BY service;

-- 10. Afficher toutes les infos de l'employé du service commercial le mieux payé
  SELECT * FROM employes WHERE service ='commercial' ORDER BY salaire DESC LIMIT 0,1;

-- 11. Afficher l'employé aant été embauché en dernier
  SELECT nom, prenom FROM employes ORDER BY date_embauche DESC LIMIT 0,1;




































































--
