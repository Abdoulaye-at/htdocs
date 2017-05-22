-- ********************* --
-- Fonctions prédéfinies --
-- ********************* --

-- Une fonction prédéfinie est une fonction pré-paramètrée par le language.

-- Fonctions sur les dates
SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_fr FROM emprunt;

SELECT NOW();

SELECT CURDATE();
SELECT CURTIME();

-- Fonctions sur les chaînes de caractères :
SELECT CONCAT('a', 'b', 'c'); -- concaténation en 'abc' (pratique pour réunir une adresse par exemple)

SELECT CONCAT_WS(' - ', 'premier prenom', 'second prenom'); -- CONCAT with Separator : concatène avec le séparateur indiqué

SELECT SUBSTRING('bonjour', 1, 3);

SELECT SUBSTRING('bonjour prenom', 8);

SELECT TRIM('    bonjour   '); -- supprime les espaces devant et derrières la chaîne de caractères
