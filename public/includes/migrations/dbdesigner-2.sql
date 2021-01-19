CREATE TABLE `users` (
	`user_id` int NOT NULL AUTO_INCREMENT,
	`email` varchar(50) NOT NULL UNIQUE,
	`username` varchar(50) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`role` varchar(20) NOT NULL DEFAULT 'defaultuser',
	`firstname` varchar(50),
	`lastname` varchar(50),
	`address` varchar(50),
	`birthdate` DATE,
	`phonenumber` int(15),
	`city` varchar(50),
	`postalcode` varchar(10),
	`vocaltype` varchar(20),
	`risergroup` int(10),
	`profilepicture` varchar(255),
	`dateupdated` TIMESTAMP,
	`datecreated` TIMESTAMP NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`createdby` int,
	`updatedby` int,
	`organisation_id` int NOT NULL DEFAULT '2',
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `organizations` (
	`organisation_id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`origindate` DATE,
	`profilepicture` varchar(255),
	`description` varchar(150),
	`invitationcode` varchar(255),
	`dateupdated` DATETIME,
	`datecreated` DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`updatedby` int,
	`createdby` int,
	PRIMARY KEY (`organisation_id`)
);

CREATE TABLE `eventitems` (
	`eventitem_id` int NOT NULL AUTO_INCREMENT,
	`startdatetime` DATETIME NOT NULL,
	`enddatetime` DATETIME NOT NULL,
	`allday` BOOLEAN NOT NULL DEFAULT false,
	`title` varchar(50) NOT NULL,
	`itemtype` int(10) NOT NULL DEFAULT '1',
	`status` int(10) NOT NULL DEFAULT '1',
	`subtitle1` varchar(255),
	`description` TEXT,
	`subtitle2` varchar(255),
	`description2` TEXT,
	`location` varchar(50),
	`locationtype` varchar(10),
	`vocaltype` int(10),
	`risergroup` int(10),
	`clothing` TEXT(255),
	`setlist` TEXT,
	`dateupdated` DATETIME,
	`conductor` int,
	`datecreated` DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`createdby` int,
	`updatedby` int,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`eventitem_id`)
);

CREATE TABLE `subeventitems` (
	`subeventitem_id` int NOT NULL AUTO_INCREMENT,
	`eventitem_id` int NOT NULL,
	`startdatetime` DATETIME NOT NULL,
	`enddatetime` DATETIME NOT NULL,
	`title` varchar(50) NOT NULL,
	`itemtype` int(10) NOT NULL DEFAULT '1',
	`status` int(10) NOT NULL DEFAULT '1',
	`description` TEXT(50),
	`location` varchar(50),
	`locationtype` varchar(10),
	`vocaltype` int(10),
	`clothing` TEXT,
	`setlist` TEXT,
	`dateupdated` DATETIME,
	`datecreated` DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`createdby` int,
	`updatedby` int,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`subeventitem_id`)
);

CREATE TABLE `presencechecks_users` (
	`presencechecks_users_id` int NOT NULL AUTO_INCREMENT,
	`presencecheck_id` int NOT NULL,
	`user_id` int NOT NULL,
	`presence` int(10) NOT NULL DEFAULT '0',
	`presence2` int(10),
	`dateupdated` DATETIME,
	`datecreated` DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`createdby` int,
	`updatedby` int,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`presencechecks_users_id`)
);

CREATE TABLE `presencechecks` (
	`presencecheck_id` int NOT NULL AUTO_INCREMENT,
	`evenitem_id` int NOT NULL,
	`maxamount` int,
	`name` varchar(50),
	`startdatetime` DATETIME,
	`enddatetime` DATETIME,
	`datecreated` DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`dateupdated` DATETIME,
	`createdby` int,
	`updatedby` int,
	`organisation_id` DATETIME NOT NULL,
	PRIMARY KEY (`presencecheck_id`)
);

CREATE TABLE `broadcasts` (
	`broadcast_id` int NOT NULL AUTO_INCREMENT,
	`broadcasttype` int(10) NOT NULL DEFAULT '1',
	`title` varchar(50) NOT NULL,
	`description` TEXT NOT NULL,
	`link` varchar(255),
	`linkedeventitem` int,
	`linkedsubeventitem` int,
	`vocaltype` varchar(10),
	`dateupdated` DATETIME,
	`datecreated` DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`createdby` int,
	`updatedby` int,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`broadcast_id`)
);

CREATE TABLE `usersettings` (
	`usersetting_id` int NOT NULL AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`setting1` BOOLEAN NOT NULL DEFAULT '0',
	`theme` int(10) DEFAULT '1',
	`dateupdated` DATETIME,
	`datecreated` DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`createdby` int,
	`updatedby` int,
	PRIMARY KEY (`usersetting_id`)
);

CREATE TABLE `organisationsettings` (
	`organisationsetting_id` int NOT NULL AUTO_INCREMENT,
	`organisation_id` int NOT NULL,
	`setting1` BOOLEAN NOT NULL DEFAULT '0',
	`setting2` int(10) NOT NULL DEFAULT '1',
	`dateupdated` DATETIME,
	`datecreated` DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
	`createdby` int,
	`updatedby` int,
	PRIMARY KEY (`organisationsetting_id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `users` ADD CONSTRAINT `users_fk1` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `users` ADD CONSTRAINT `users_fk2` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `organizations` ADD CONSTRAINT `organizations_fk0` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `organizations` ADD CONSTRAINT `organizations_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `eventitems` ADD CONSTRAINT `eventitems_fk0` FOREIGN KEY (`conductor`) REFERENCES `users`(`user_id`);

ALTER TABLE `eventitems` ADD CONSTRAINT `eventitems_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `eventitems` ADD CONSTRAINT `eventitems_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `eventitems` ADD CONSTRAINT `eventitems_fk3` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `subeventitems` ADD CONSTRAINT `subeventitems_fk0` FOREIGN KEY (`eventitem_id`) REFERENCES `subeventitems`(`eventitem_id`);

ALTER TABLE `subeventitems` ADD CONSTRAINT `subeventitems_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `subeventitems` ADD CONSTRAINT `subeventitems_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `subeventitems` ADD CONSTRAINT `subeventitems_fk3` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk0` FOREIGN KEY (`presencecheck_id`) REFERENCES `presencechecks`(`presencecheck_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk2` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk3` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk4` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `presencechecks` ADD CONSTRAINT `presencechecks_fk0` FOREIGN KEY (`evenitem_id`) REFERENCES `subeventitems`(`eventitem_id`);

ALTER TABLE `presencechecks` ADD CONSTRAINT `presencechecks_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks` ADD CONSTRAINT `presencechecks_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks` ADD CONSTRAINT `presencechecks_fk3` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk0` FOREIGN KEY (`linkedeventitem`) REFERENCES `subeventitems`(`eventitem_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk1` FOREIGN KEY (`linkedsubeventitem`) REFERENCES `subeventitems`(`subeventitem_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk2` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk3` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk4` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `usersettings` ADD CONSTRAINT `usersettings_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `usersettings` ADD CONSTRAINT `usersettings_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `usersettings` ADD CONSTRAINT `usersettings_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `organisationsettings` ADD CONSTRAINT `organisationsettings_fk0` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `organisationsettings` ADD CONSTRAINT `organisationsettings_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `organisationsettings` ADD CONSTRAINT `organisationsettings_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

