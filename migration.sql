-- Type de compte
CREATE TYPE typeCompte AS ENUM ('PRINCIPAL', 'SECONDAIRE');

-- Type de transaction
CREATE TYPE typeTransaction AS ENUM ('DEPOT', 'RETRAIT', 'PAIEMENT', 'TRANSFERT');

CREATE TABLE profil (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE utilisateur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    telephone VARCHAR(20) UNIQUE NOT NULL,
    password VARCHAR(255),
    cni VARCHAR(150) UNIQUE NOT NULL,
    photo_recto TEXT,
    photo_verso TEXT,
    adresse VARCHAR(255),
    profil_id INTEGER REFERENCES profil(id)
);

CREATE TABLE compte (
    id SERIAL PRIMARY KEY,
    solde NUMERIC(12,2) DEFAULT 0,
    numero_tel VARCHAR(20) UNIQUE NOT NULL,
    typeCompte type_compte,
    utilisateur_id INTEGER REFERENCES utilisateur (id)
);

CREATE TABLE transaction (
    id SERIAL PRIMARY KEY,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    typeTransaction typeTransaction NOT NULL,
    montant NUMERIC(12,2) NOT NULL,
    compte_id INTEGER REFERENCES compte(id)
);

INSERT INTO profil (libelle) VALUES 
('client'),
('vendeur'),
('admin');

INSERT INTO utilisateur (nom, prenom, telephone, password, cni, adresse, profil_id)
VALUES 
('Ly', 'Abdoulaye', '777000111', 'pass123', 'CNI123456', 'Dakar', 1),
('Fall', 'Awa', '777000222', 'pass456', 'CNI654321', 'Thies', 1);

INSERT INTO compte (solde, numero_tel, type_compte, utilisateur_id)
VALUES 
(12345.00, '777000111', 'PRINCIPALE', 1),
(5000.00, '777000222', 'PRINCIPALE', 2);

INSERT INTO transaction (date, typeTransaction, montant, compte_id) VALUES
(now() - INTERVAL '9 days', 'DEPOT',     50000.00, 1),
(now() - INTERVAL '8 days', 'RETRAIT',   20000.00, 1),
(now() - INTERVAL '7 days', 'TRANSFERT', 75000.00, 1),
(now() - INTERVAL '6 days', 'PAIEMENT',  30000.00, 1),
(now() - INTERVAL '5 days', 'DEPOT',     10000.00, 1),
(now() - INTERVAL '4 days', 'RETRAIT',   150000.00, 1),
(now() - INTERVAL '3 days', 'TRANSFERT', 45000.00, 1),
(now() - INTERVAL '2 days', 'PAIEMENT',  5000.00, 1),
(now() - INTERVAL '1 day',  'DEPOT',     25000.00, 1),
(now(),                 'RETRAIT',   60000.00, 1);
