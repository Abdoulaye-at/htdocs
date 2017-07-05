--**************************--
-- Tables Virtuelles : Vues --
--**************************--

-- Les vues ou tables virtuelles sont des objets de la BDD, constituées d'un nom, et d'une requête de sélection.

-- Une fois qu'une vue est définie, on peut l'utiliser comme n'importe quelle table. Cette vue contient un sous-ensemble de données résultant de la requête de selection

USE entreprise;

CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe = 'm';

SELECT prenom FROM vue_homme;

-- !! La table d'origine est synchronisée avec la vue !! --
-- Il y a un intérêt à faire des vues en termes de gain de performances, ou quand il y a des requêtes complexes à executer. La vue sert dans ce cas à stocjer les résultats d'une première requête sur laquelle sera executée une seconde requête.

DROP VIEW vue_homme;


--********************--
-- Tables Temporaires --
--********************--

-- Création d'une table temporaire

CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = 'f'; -- Ceci crée une table temporaire appelée "temp" avec les données du SELECT précisé. Cette table s'efface quand on quitte la session, ou la connexion à la BDD. Elle n'est pas visible dans la liste des tables avec SHOW TABLES.

-- Utiliser une table temporaire :
SELECT prenom FROM temp; -- affiche les prenoms de la table temporaire

--Contrairement aux vues, s'il y a un changement dans la table d'origine, la table temporaire n'est pas impactée acr elle est une copie à un instant t de celle-ci  (les données sont dupliquées)


--***********--
-- Exercices --
--***********--

--1-- Qui conduit l'id_vehicule 503 ?
SELECT c.prenom
FROM conducteur c
LEFT JOIN association_vehicule_conducteur avc
ON c.id_conducteur = avc.id_conducteur
WHERE id_vehicule = '503';

--2-- Qui conduit quel modèle ?

SELECT c.nom, c.prenom, v.marque, v.modele
FROM conducteur c
INNER JOIN association_vehicule_conducteur avc
ON c.id_conducteur = avc.id_conducteur
INNER JOIN vehicule v
ON avc.id_vehicule = v.id_vehicule;

--3-- Ajoutez vous dans la liste des conducteurs
INSERT INTO conducteur( prenom, nom)
  VALUES ( 'Abdoulaye', 'Thiaw');

--4-- Afficher tous les conducteurs (y compris ceux qui n'ont pas de véhicule) affecté ainsi que les modèles de ce véhicule
SELECT c.prenom, c.nom, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur avc
ON avc.id_conducteur = c.id_conducteur
LEFT JOIN vehicule v
ON v.id_vehicule = avc.id_vehicule;

--5-- Ajouter un nouvel enregistrement dans la table véhicule
INSERT INTO vehicule( marque, modele, couleur, immatriculation)
  VALUES ( 'BMW', 'M4', 'marron', 'AA-512-BB');

--6-- Affichez tous les modèles de véhicules, y compris ceux qui n'ont pas de chauffeur affecté et le prénom de conducteurs
SELECT v.modele, c.prenom
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur avc
ON avc.id_conducteur = c.id_conducteur
RIGHT JOIN vehicule v
ON v.id_vehicule = avc.id_vehicule;


--7-- Affichez les prénoms des conducteurs (y compris ceux qui n'ont pas de véhicule), et tous les modèles (y  compris ceux qui n'ont pas de conducteur)
(SELECT v.modele, c.prenom
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur avc
ON avc.id_conducteur = c.id_conducteur
RIGHT JOIN vehicule v
ON v.id_vehicule = avc.id_vehicule)

UNION

(SELECT v.modele, c.prenom
  FROM conducteur c
  LEFT JOIN association_vehicule_conducteur avc
  ON avc.id_conducteur = c.id_conducteur
  LEFT JOIN vehicule v
  ON v.id_vehicule = avc.id_vehicule);























--
