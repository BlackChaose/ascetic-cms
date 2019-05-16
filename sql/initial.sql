CREATE DATABASE ascetic_cms;
CREATE USER 'ascetic_user'@'localhost' IDENTIFIED BY 'ascetpasskey12!';
GRANT ALL ON ascetic_cms.* TO 'ascetic_user'@'localhost';

CREATE table users
(
    id INTEGER NOT NULL,
    name_second VARCHAR(255),
    name_first VARCHAR(255),
    patronymic VARCHAR(255),
    login_name VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    request_confirm_send BOOLEAN,
    accaunt_confirm BOOLEAN,
    e_mail VARCHAR(255),    
    phone VARCHAR(20),
    access_role_id INTEGER,
    PRIMARY KEY(id)
    );
CREATE TABLE roles
(
    id INTEGER NOT NULL,
    name VARCHAR(255),
    PRIMARY KEY(id)    
    );

ALTER TABLE users
ADD FOREIGN KEY(access_role_id) REFERENCES roles(id);

--show schema table users

DESCRIBE users;

ALTER TABLE users
   MODIFY id INTEGER NOT NULL AUTO_INCREMENT;

-- FIXME: error in MySQL!
ALTER TABLE roles
   MODIFY id INTEGER NOT NULL AUTO_INCREMENT;

INSERT INTO roles(
    id,
    name
) VALUES(1,'GOD'),
        (2,'ADMIN'),
        (3,'USER');

-- Bless as face!
-- FCE272209BA56EB95773AA1FA4313E32

-- AsdfGhj!
-- 2CC3E79089F5EE0D63BD0F9133E82FB8

INSERT INTO users(
    login_name,
    password_hash,
    access_role_id
) VALUES
('Vasya', 'FCE272209BA56EB95773AA1FA4313E32', 2),
('Admin', '2CC3E79089F5EE0D63BD0F9133E82FB8', 1);
