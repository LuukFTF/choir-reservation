-- # Users

INSERT INTO users (email, username, password, firstname, lastname, role, organisation_id)
VALUES
	('admin@example.com', 'admin', '$2y$10$RvAdkWzTztrAarOp7pIwWu1Ug0EcBgCXTF7i/feudp.PEGakupqSC', 'admin', 'admin', 'sysadmin', 1),
    ('lucasvdvegt@gmail.com', 'LucasV', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Lucas', 'van der Vegt', 'defaultuser', 3),
	('jeffrey79@example.com', 'Jeffrey', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Jeffrey', 'van der Vegt', 'admin', 3),
	('daveg@example.com', 'DaveG', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Dave', 'Grohl', 'moderator', 4),
	('chris@example.com', 'ChrisS', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Chris', 'Shiflett', 'defaultuser', 4),
	('danerrr23@example.com', 'danerrr', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Dan', 'Reynolds', 'guest', 4),
	('patpat@example.com', 'SmearP', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Pat', 'Smear', 'defaultuser', 4),
	('natemp@example.com', 'Natem', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Nate', 'Mendal', 'defaultuser', 4),
	('thawk@example.com', 'THawk', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Taylor', 'Hawkins', 'defaultuser', 4)

-- # Organisations

INSERT INTO organisations (name)
VALUES ('reflax'), ('foofighters')