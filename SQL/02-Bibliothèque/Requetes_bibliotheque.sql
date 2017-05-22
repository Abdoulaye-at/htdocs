-- ********************--
--  Création de la BDD --
-- ********************--

CREATE DATABASE bibliotheque;

SHOW DATABASES;

-- ********* --
-- EXERCICES --
-- ********* --

--1-- Afficher l'id abonné de Laura
SELECT id_abonne FROM abonne WHERE prenom = "Laura";

--2-- Afficher les dates d'emprunts d'id_abonne 2
SELECT date_sortie FROM emprunt WHERE id_abonne = "2";

--3-- Combien d'emprunts ont été effectués en tout ?
SELECT COUNT(id_emprunt) FROM emprunt;

--4-- Combien de livres sont sortis le 2011-12-19 ?
SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie = '2011-12-19';

--5-- Afficher l'auteur du livre "Une Vie"
SELECT auteur FROM livre WHERE titre = "Une vie";

--6-- De combien de livres d'Alexandre Dumas dispose t-on ?
SELECT COUNT(id_livre) FROM livre WHERE auteur = "Alexandre Dumas";

--7-- Quel id_livre est le plus emprunté ?
SELECT id_livre, COUNT(id_emprunt) FROM emprunt GROUP BY id_livre ORDER BY COUNT(id_emprunt) DESC LIMIT 0,1;

--8-- Quel id_abonne emprunte le plus de livres ?
SELECT id_abonne, COUNT(id_abonne) FROM abonne GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 0,1;


-- ******************* --
-- Requêtes imbriquées --
-- ******************* --

-- Une requête imbriquée premet de réaliser des requêtes sur une ou plusieurs tables à la fois.
-- Pour réaliser une requête imbriquée, il faut obligatoirement un champ commun entre les deux tables.

-- Un champ nul se teste avec IS NULL :
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- affiche les id_livre non rendus

-- Afficher le titre de ces livres non rendus :
SELECT titre FROM livre where id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);
  --Notez que l'on exécute d'abord la requête entre parenthèses, puis celle à l'extérieur

-- Le IN de la seconde requête peut être remplacé par un "=" ; on utilise le IN quand il y a plusieurs résultats, alors que l'on utilise "=" quand on est sûr de n'avoir qu'un seul résultat.
  -- Exemple :
    -- Afficher les id des livres que Chloé a emprunté
SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = "chloe");


-- ********* --
-- EXERCICES --
-- ********* --

--1-- Afficher les prénoms des abonnés ayant emprunté un livre le '2011-12-19'
  SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = "2011-12-19");

--2-- Afficher le prénom des abonnés ayant emprunté un livre d'Alphonse Daudet.
  SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livre WHERE auteur = "Alphonse Daudet"));

--3-- Nous aimerions avoir le titre des livres que Chloé a emprunté.
  SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = "Chloe"));

--4-- Nous aimerions avoir le titre des livres que Chloé n'a pas emprunté.
  SELECT titre FROM livre WHERE id_livre NOT IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = "Chloe"));

--5-- Combien de livres Benoît a t-il emprunté à la bibliotheque ?
  SELECT COUNT(id_emprunt) AS nombre_de_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = "Benoit" );

--6-- Afficher le prénom de l'abonné qui a emprunté le plus de livres à la bibliothèque.
  SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 0,1);



  -- ********************** --
  -- Les jointures internes --
  -- ********************** --

-- Une jointure est possible dans tout les cas, alors qu'une requête imbriquée est possible seulement dans le cas où les champs affichés (ceux qui sont dans le SELECT) proviennent de la même table. Avec une jointure, ils pourront être affichés dans le même SELECT et issus de tables différentes.

-- Nous aimerions connaître les dates de sorties et de rendus pour l'abonné Guillaume :
SELECT a.prenom, e.date_sortie, e.date_rendu -- ce que je souhaite afficher
FROM abonne a -- la source des informations
INNER JOIN emprunt e -- one lie la 1ere table à la 2ème
ON a.id_abonne = e.id_abonne -- je lie les deux champs
WHERE a.prenom = 'Guillaume'; -- conditions supplémentaires sur le prenom

-- Notez que lorsqu'il y a 3 tables à joindre, on fait suivre 2 "INNER JOIN... ON" l'un à la suite de l'autre


-- ********* --
-- EXERCICES --
-- ********* --

--1-- Afficher les titres, dates de sorties, et dates de rendus des livres écrits par Alphonse DAUDET

  SELECT l.titre, e.date_rendu, e.date_sortie
  FROM livre l
  INNER JOIN emprunt e
  ON l.id_livre = e.id_livre
  WHERE l.auteur = "Alphonse DAUDET";

--2-- Afficher le prenom de l'abonné qui a emprunté "Une Vie" sur 2011

  SELECT a.prenom, l.titre, e.date_sortie
  FROM abonne a
  INNER JOIN emprunt e
  ON a.id_abonne = e.id_abonne
  INNER JOIN livre l
  ON e.id_livre = l.id_livre
  WHERE titre = 'une vie' AND (date_sortie BETWEEN '2011-01-01' AND '2011-12-31');


--3-- Afficher le nombre de livres empruntés par chaque abonnés

  SELECT a.prenom, COUNT(e.id_livre)
  FROM abonne a
  INNER JOIN emprunt e
  ON a.id_abonne = e.id_abonne
  GROUP BY a.id_abonne; -- il faut penser  à regrouper les résultats agrégés


--4-- Afficher une liste de tous les abonnés, le titre et la date de leurs emprunts
  SELECT a.prenom, l.titre, e.date_sortie
  FROM abonne a
  INNER JOIN emprunt e
  on a.id_abonne = e.id_abonne
  INNER JOIN livre l
  ON e.id_livre = l.id_livre;


--*********************************************--
SELECT a.prenom, e.id_livre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne;

-- ********************** --
-- Les jointures externes --
-- ********************** --

-- Jointure externe est une requête sans correspondance exigée entre les valeurs affichées.

-- Exemple :
INSERT INTO abonne (prenom) VALUES ('moi'); -- j'insert mes coordonnées dans la table abonné

-- Si on relance la dernière reqiêute de jointure interne, je n'apparaît pas dans la liste des abonnés ( car je n'ai rien emprunté)
-- Si l'on souhaite que la liste des abonnés soit exhaustive, y compris ceux qui n'ont rien empruntés, on fait une jointure externe :

SELECT abonne.prenom, emprunt.id_livre
FROM abonne
LEFT JOIN emprunt
ON abonne.id_abonne = emprunt.id_abonne;

-- La clause LEFT JOIN permet de rapatrier toutes les données de la table considérée comme étant à gauche de l'instruction, sans correspondance exigée dans l'autre table.
-- Les valeurs n'ayant pas de correspondance apparaîssent avec la mention NULL.

-- Voici le cas avec un livre supprimé de la bibliotheque :
  --1-- On supprime le livre "Une vie" d'id_livre 100 :
    DELETE FROM livre WHERE id_livre = 100;

  --2-- On affiche la liste de tous les les emprunts, y compris ceux pour lesquels il manque un livre :
    SELECT e.id_emprunt, l.titre
    FROM emprunt e
    LEFT JOIN livre l
    ON e.id_livre = l.id_livre;

    --Right JOIN
    SELECT e.id_emprunt, l.titre
    FROM livre l
    LEFT JOIN emprunt e
    ON e.id_livre = l.id_livre;


--*******--
-- UNION --
--*******--

-- Union permet de fusionner le résultat de deux requêtes dans la même liste de résultats.

-- Exemple : Si on désinscrit Guillaume (delete), on peut afficher à la fois tous les livres empruntés, y compris par des lecteurs désinscrits ( on affiche NULL à la place de Guillaume), et tous les abonnés y compris ceux qui n'ont rien empruntés (on affiche NULL dans id_livre pour 'moi').

-- Suppression de l'abonné Guillaume :
  DELETE FROM abonne WHERE id_abonne = 1;

--Requête sur les livres empruntés :
( SELECT abonne.prenom, emprunt.id_livre
  FROM abonne
  LEFT JOIN emprunt
  ON abonne.id_abonne = emprunt.id_abonne )

UNION

( SELECT abonne.prenom, emprunt.id_livre
  FROM abonne
  RIGHT JOIN emprunt
  ON abonne.id_abonne = emprunt.id_abonne );


--






--
