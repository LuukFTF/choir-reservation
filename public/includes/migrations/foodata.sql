-- # Organisations

INSERT INTO organisations (name)
VALUES ('foofighters'), ('reflax');

--- ## Default Organisation Users
INSERT INTO users (email, username, password, firstname, lastname, role, organisation_id)
VALUES
    ('foo-admin@admin.com', 'foo-admin', '$2y$10$RvAdkWzTztrAarOp7pIwWu1Ug0EcBgCXTF7i/feudp.PEGakupqSC', 'foo-admin', 'foo-admin', 'admin', 3),
	('foo-user@example.com', 'foo-user', '$2y$10$uURow.HOfhHwbU10zlnQ3eswTUXkOZ7jjtwnbmdvCJ91/FMWKSnBC', 'foo-user', 'foo-user', 'defaultuser', 3),
	('foo-mod@example.com', 'foo-mod', '$2y$10$uURow.HOfhHwbU10zlnQ3eswTUXkOZ7jjtwnbmdvCJ91/FMWKSnBC', 'foo-mod', 'foo-mod', 'moderator', 3),
	('foo-editor@example.com', 'foo-editor', '$2y$10$uURow.HOfhHwbU10zlnQ3eswTUXkOZ7jjtwnbmdvCJ91/FMWKSnBC', 'foo-editor', 'foo-editor', 'editor', 3),
	('foo-guest@example.com', 'foo-guest', '$2y$10$uURow.HOfhHwbU10zlnQ3eswTUXkOZ7jjtwnbmdvCJ91/FMWKSnBC', 'foo-guest', 'foo-guest', 'guest', 3);

INSERT INTO users (email, username, password, firstname, lastname, role, organisation_id)
VALUES
    ('reflax-admin@admin.com', 'reflax-admin', '$2y$10$RvAdkWzTztrAarOp7pIwWu1Ug0EcBgCXTF7i/feudp.PEGakupqSC', 'reflax-admin', 'reflax-admin', 'admin', 4),
	('reflax-user@example.com', 'reflax-user', '$2y$10$uURow.HOfhHwbU10zlnQ3eswTUXkOZ7jjtwnbmdvCJ91/FMWKSnBC', 'reflax-user', 'reflax-user', 'defaultuser', 4),
	('reflax-mod@example.com', 'reflax-mod', '$2y$10$uURow.HOfhHwbU10zlnQ3eswTUXkOZ7jjtwnbmdvCJ91/FMWKSnBC', 'reflax-mod', 'reflax-mod', 'moderator', 4),
	('reflax-editor@example.com', 'reflax-editor', '$2y$10$uURow.HOfhHwbU10zlnQ3eswTUXkOZ7jjtwnbmdvCJ91/FMWKSnBC', 'reflax-editor', 'reflax-editor', 'editor', 4),
	('reflax-guest@example.com', 'reflax-guest', '$2y$10$uURow.HOfhHwbU10zlnQ3eswTUXkOZ7jjtwnbmdvCJ91/FMWKSnBC', 'reflax-guest', 'reflax-guest', 'guest', 4);

-- # Users

--- # Foo Fighters

INSERT INTO users (email, username, password, firstname, lastname, role, organisation_id)
VALUES
	('daveg@example.com', 'DaveG', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Dave', 'Grohl', 'moderator', 3),
	('chris@example.com', 'ChrisS', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Chris', 'Shiflett', 'default', 3),
	('danerrr23@example.com', 'danerrr', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Dan', 'Reynolds', 'guest', 3),
	('patpat@example.com', 'SmearP', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Pat', 'Smear', 'default', 3),
	('natemp@example.com', 'Natem', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Nate', 'Mendal', 'default', 3),
	('thawk@example.com', 'THawk', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Taylor', 'Hawkins', 'default', 3);

--- # Reflax
INSERT INTO users (email, username, password, firstname, lastname, role, organisation_id)
VALUES
    ('lucasvdvegt@gmail.com', 'LucasV', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Lucas', 'van der Vegt', 'default', 4),
	('jeffrey79@example.com', 'Jeffrey', '$2y$10$L8y.SG8oMTz/EPbTGLfybOVNhpDX/LSCP8uY18xidNN/lIdmlU98K', 'Jeffrey', 'van der Vegt', 'admin', 4);

