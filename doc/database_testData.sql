USE db_furnitureShop;

INSERT INTO role (id, name, description) VALUES (1, 'admin', 'Administrator'), (2, 'default', 'Default role');

INSERT INTO user (id, birthday, email, lastLogin, firstName, lastName, male, newsletterEnabled, password, username, roleId) VALUES(1, '2013-01-01', 'hero@mailinator.com', '2013-11-11', 'Hero', 'Superman', 1, 1, 'huhuhuhu', 'hero', 1);
INSERT INTO user (id, birthday, email, lastLogin, firstName, lastName, male, newsletterEnabled, password, username, roleId) VALUES(2, '2013-01-01', 'gigu@mailinator.com', '2013-11-11', 'Gigu', 'Wixxer', 1, 1, 'huhuhuhu', 'gigu', 2);

INSERT INTO `category` (`id`, `name_de`, `name_en`, `isOpen`, `orderDate`, `roleId`) VALUES
(1, 'Betten', 'Bed', 0, NULL, NULL),
(2, 'Leuchten', 'Luminaire', 0, NULL, NULL),
(3, 'Sitz&ouml;bel', 'Seating furniture', 0, NULL, NULL),
(4, 'Schlafen', 'Sleep', 0, NULL, NULL),
(5, 'Tische', 'Tables', 0, NULL, NULL);