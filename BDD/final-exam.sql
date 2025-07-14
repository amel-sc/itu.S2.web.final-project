create database final_exam;
use final_exam;

-- tables
create table fn_membre (
    id_membre int auto_increment primary key,
    nom varchar (100),
    birth_date date,
    genre enum ("M", "F"),
    email text,
    ville varchar (100),
    mdp varchar (100),
    image_profil text
);

create table fn_categorie_objet (
    id_categorie int auto_increment primary key,
    nom_categorie varchar (100)
);

create table fn_objet (
    id_objet int auto_increment primary key,
    nom_objet varchar (100),
    id_categorie int,
    id_membre int,
    Constraint fk_categorie_objet foreign key (id_categorie) references fn_categorie_objet(id_categorie),
    Constraint fk_membre_objet foreign key (id_membre) references fn_membre(id_membre)
);

create table fn_images_objet (
    id_image int auto_increment primary key,
    id_objet int,
    nom_image text,
    Constraint fk_objet_image foreign key (id_objet) references fn_objet(id_objet)
);

create table fn_emprunt (
    id_emprunt int auto_increment primary key,
    id_objet int,
    id_membre int,
    date_emprunt date,
    date_retour date,
    Constraint fk_objet_emprunt foreign key (id_objet) references fn_objet(id_objet),
    Constraint fk_membre_emprunt foreign key (id_membre) references fn_membre(id_membre)
);


-- insert values
-- fn_membre
INSERT INTO fn_membre (nom, birth_date, genre, email, ville, mdp, image_profil) VALUES
("Alice", "1995-03-15", "F", "alice@example.com", "Antananarivo", "mdp123", "../assets/images/user.png"),
("Bob", "1990-06-20", "M", "bob@example.com", "Toamasina", "mdp123", "../assets/images/user.png"),
("Carla", "1988-11-05", "F", "carla@example.com", "Fianarantsoa", "mdp123", "../assets/images/user.png"),
("David", "1992-01-30", "M", "david@example.com", "Mahajanga", "mdp123", "../assets/images/user.png");

-- fn_categorie_objet
INSERT INTO fn_categorie_objet (nom_categorie) VALUES
("Esthétique"),
("Bricolage"),
("Mécanique"),
("Cuisine");

-- fn_objet
-- Objets pour Membre 1 (id_membre = 1)
INSERT INTO fn_objet (nom_objet, id_categorie, id_membre) VALUES
("Peigne ancien", 1, 1),
("Marteau", 2, 1),
("Clé à molette", 3, 1),
("Mixeur", 4, 1),
("Brosse", 1, 1),
("Tournevis", 2, 1),
("Pompe", 3, 1),
("Blender", 4, 1),
("Crème visage", 1, 1),
("Perceuse", 2, 1);

-- Objets pour Membre 2 (id_membre = 2)
INSERT INTO fn_objet (nom_objet, id_categorie, id_membre) VALUES
("Fer à lisser", 1, 2),
("Scie", 2, 2),
("Pneu", 3, 2),
("Four", 4, 2),
("Lotion", 1, 2),
("Cloueur", 2, 2),
("Batterie", 3, 2),
("Grille-pain", 4, 2),
("Savon naturel", 1, 2),
("Tournevis électrique", 2, 2);

-- Objets pour Membre 3 (id_membre = 3)
INSERT INTO fn_objet (nom_objet, id_categorie, id_membre) VALUES
("Crayon sourcils", 1, 3),
("Scie sauteuse", 2, 3),
("Jack hydraulique", 3, 3),
("Micro-ondes", 4, 3),
("Shampoing", 1, 3),
("Visseuse", 2, 3),
("Filtre huile", 3, 3),
("Mijoteuse", 4, 3),
("Poudre compacte", 1, 3),
("Niveau laser", 2, 3);

-- Objets pour Membre 4 (id_membre = 4)
INSERT INTO fn_objet (nom_objet, id_categorie, id_membre) VALUES
("Palette maquillage", 1, 4),
("Perceuse visseuse", 2, 4),
("Cric", 3, 4),
("Casserole", 4, 4),
("Rouge à lèvres", 1, 4),
("Étau", 2, 4),
("Bouchon vidange", 3, 4),
("Poêle", 4, 4),
("Mascara", 1, 4),
("Ponceuse", 2, 4);

-- Emprunts (id_objet, id_membre_emprunteur, date_emprunt, date_retour)
INSERT INTO fn_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),
(5, 3, '2025-07-02', '2025-07-09'),
(11, 1, '2025-07-03', '2025-07-13'),
(14, 3, '2025-07-04', '2025-07-14'),
(21, 2, '2025-07-05', '2025-07-15'),
(25, 4, '2025-07-06', '2025-07-11'),
(31, 1, '2025-07-07', '2025-07-17'),
(33, 2, '2025-07-08', '2025-07-12'),
(36, 3, '2025-07-09', '2025-07-19'),
(40, 1, '2025-07-10', '2025-07-20');
