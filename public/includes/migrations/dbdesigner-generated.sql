CREATE TABLE `users` (
	`user_id` int NOT NULL AUTO_INCREMENT,
	`email` varchar(50) NOT NULL,
	`username` varchar(50) NOT NULL,
	`password` varchar(50) NOT NULL,
	`firstname` varchar(50) NOT NULL,
	`lastname` varchar(50) NOT NULL,
	`address` varchar(50) NOT NULL,
	`birthdate` DATE NOT NULL,
	`phonenumber` int(15) NOT NULL,
	`city` varchar(50) NOT NULL,
	`postalcode` varchar(10) NOT NULL,
	`vocaltype` varchar(20) NOT NULL,
	`role` varchar(20) NOT NULL,
	`risergroup` int NOT NULL,
	`profilepicture` varchar(255) NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `organizations` (
	`organisation_id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`origindate` DATE NOT NULL,
	`profilepicture` varchar(255) NOT NULL,
	`description` varchar(150) NOT NULL,
	`invitationcode` varchar(50) NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	PRIMARY KEY (`organisation_id`)
);

CREATE TABLE `agendaitems` (
	`agendaitem_id` int NOT NULL AUTO_INCREMENT,
	`startdatetime` DATETIME NOT NULL,
	`enddatetime` DATETIME NOT NULL,
	`allday` BOOLEAN NOT NULL,
	`title` varchar(50) NOT NULL,
	`description` TEXT NOT NULL,
	`description2` TEXT NOT NULL,
	`homework` TEXT NOT NULL,
	`itemtype` varchar(10) NOT NULL,
	`location` varchar(50) NOT NULL,
	`locationtype` varchar(10) NOT NULL,
	`status` varchar(10) NOT NULL,
	`conductor` int NOT NULL,
	`vocaltype` varchar(15) NOT NULL,
	`clothing` varchar(50) NOT NULL,
	`risergroup` int(10) NOT NULL,
	`setlist` varchar(255) NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`agendaitem_id`)
);

CREATE TABLE `subagendaitems` (
	`subagendaitem_id` int NOT NULL AUTO_INCREMENT,
	`agendaitem_id` int NOT NULL,
	`startdatetime` DATETIME NOT NULL,
	`enddatetime` DATETIME NOT NULL,
	`title` varchar(50) NOT NULL,
	`description` TEXT(50) NOT NULL,
	`itemtype` varchar(10) NOT NULL,
	`location` varchar(50) NOT NULL,
	`locationtype` varchar(10) NOT NULL,
	`status` varchar(10) NOT NULL,
	`vocaltype` varchar(10) NOT NULL,
	`clothing` varchar(255) NOT NULL,
	`setlist` varchar(255) NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`subagendaitem_id`)
);

CREATE TABLE `presencechecks_users` (
	`presencechecks_users_id` int NOT NULL AUTO_INCREMENT,
	`presencecheck_id` int NOT NULL,
	`user_id` int NOT NULL,
	`presence` int(10) NOT NULL,
	`presence2` int(10) NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`presencechecks_users_id`)
);

CREATE TABLE `presencechecks` (
	`presencecheck_id` int NOT NULL AUTO_INCREMENT,
	`agendaitem_id` int NOT NULL,
	`maxamount` int NOT NULL,
	`name` varchar(50) NOT NULL,
	`startdatetime` DATETIME NOT NULL,
	`enddatetime` DATETIME NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	`organisation_id` DATETIME NOT NULL,
	PRIMARY KEY (`presencecheck_id`)
);

CREATE TABLE `broadcasts` (
	`broadcast_id` int NOT NULL AUTO_INCREMENT,
	`broadcasttype` int(10) NOT NULL,
	`title` varchar(50) NOT NULL,
	`description` TEXT NOT NULL,
	`link` varchar(255) NOT NULL,
	`linkedagendaitem` int NOT NULL,
	`linkedsubagendaitem` int NOT NULL,
	`vocaltype` varchar(10) NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	`organisation_id` int NOT NULL,
	PRIMARY KEY (`broadcast_id`)
);

CREATE TABLE `usersettings` (
	`usersetting_id` int NOT NULL AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`setting1` BOOLEAN NOT NULL,
	`theme` varchar(10) NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	PRIMARY KEY (`usersetting_id`)
);

CREATE TABLE `organisationsettings` (
	`organisationsetting_id` int NOT NULL AUTO_INCREMENT,
	`organisation_id` int NOT NULL,
	`setting1` BOOLEAN NOT NULL,
	`setting2` varchar(10) NOT NULL,
	`dateupdated` DATETIME NOT NULL,
	`datecreated` DATETIME NOT NULL,
	`createdby` int NOT NULL,
	`updatedby` int NOT NULL,
	PRIMARY KEY (`organisationsetting_id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `users` ADD CONSTRAINT `users_fk1` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `users` ADD CONSTRAINT `users_fk2` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `organizations` ADD CONSTRAINT `organizations_fk0` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `organizations` ADD CONSTRAINT `organizations_fk1` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `agendaitems` ADD CONSTRAINT `agendaitems_fk0` FOREIGN KEY (`conductor`) REFERENCES `users`(`user_id`);

ALTER TABLE `agendaitems` ADD CONSTRAINT `agendaitems_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `agendaitems` ADD CONSTRAINT `agendaitems_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `agendaitems` ADD CONSTRAINT `agendaitems_fk3` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `subagendaitems` ADD CONSTRAINT `subagendaitems_fk0` FOREIGN KEY (`agendaitem_id`) REFERENCES `agendaitems`(`agendaitem_id`);

ALTER TABLE `subagendaitems` ADD CONSTRAINT `subagendaitems_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `subagendaitems` ADD CONSTRAINT `subagendaitems_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `subagendaitems` ADD CONSTRAINT `subagendaitems_fk3` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk0` FOREIGN KEY (`presencecheck_id`) REFERENCES `presencechecks`(`presencecheck_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk2` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk3` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks_users` ADD CONSTRAINT `presencechecks_users_fk4` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `presencechecks` ADD CONSTRAINT `presencechecks_fk0` FOREIGN KEY (`agendaitem_id`) REFERENCES `agendaitems`(`agendaitem_id`);

ALTER TABLE `presencechecks` ADD CONSTRAINT `presencechecks_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks` ADD CONSTRAINT `presencechecks_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `presencechecks` ADD CONSTRAINT `presencechecks_fk3` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk0` FOREIGN KEY (`linkedagendaitem`) REFERENCES `agendaitems`(`agendaitem_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk1` FOREIGN KEY (`linkedsubagendaitem`) REFERENCES `subagendaitems`(`subagendaitem_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk2` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk3` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `broadcasts` ADD CONSTRAINT `broadcasts_fk4` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `usersettings` ADD CONSTRAINT `usersettings_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `usersettings` ADD CONSTRAINT `usersettings_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `usersettings` ADD CONSTRAINT `usersettings_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

ALTER TABLE `organisationsettings` ADD CONSTRAINT `organisationsettings_fk0` FOREIGN KEY (`organisation_id`) REFERENCES `organizations`(`organisation_id`);

ALTER TABLE `organisationsettings` ADD CONSTRAINT `organisationsettings_fk1` FOREIGN KEY (`createdby`) REFERENCES `users`(`user_id`);

ALTER TABLE `organisationsettings` ADD CONSTRAINT `organisationsettings_fk2` FOREIGN KEY (`updatedby`) REFERENCES `users`(`user_id`);

