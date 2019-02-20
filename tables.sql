CREATE TABLE barbers (
    id int AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE clients (
    id int AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    Visit int,
    PRIMARY KEY (id)
);
CREATE TABLE reservations (
    id int AUTO_INCREMENT,
    date DATETIME NOT NULL,
    client_id int NOT NULL,
    barber_id int NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW(),
    completed BOOLEAN NOT NULL DEFAULT 0,

    PRIMARY KEY (id)
);