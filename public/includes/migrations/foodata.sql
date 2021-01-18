-- # Users

INSERT INTO users (email, username, password, firstname, lastname, role, organisation_id)
VALUES
	('admin@example.com', 'admin', 'admin', 'admin', 'admin', 'sysadmin', 1),
    ('lucasvdvegt@gmail.com', 'LucasV', '123', 'Lucas', 'van der Vegt', 'default', 3),
	('jeffrey79@example.com', 'Jeffrey', '123', 'Jeffrey', 'van der Vegt', 'admin', 3),
	('daveg@example.com', 'DaveG', '123', 'Dave', 'Grohl', 'moderator', 4),
	('chris@example.com', 'ChrisS', '123', 'Chris', 'Shiflett', 'default', 4),
	('danerrr23@example.com', 'danerrr', '123', 'Dan', 'Reynolds', 'guest', 4),
	('patpat@example.com', 'SmearP', '123', 'Pat', 'Smear', 'default', 4),
	('natemp@example.com', 'Natem', '123', 'Nate', 'Mendal', 'default', 4),
	('thawk@example.com', 'THawk', '123', 'Taylor', 'Hawkins', 'default', 4)

-- # Organisations

INSERT INTO organisations (name)
VALUES ('reflax'), ('foofighters')