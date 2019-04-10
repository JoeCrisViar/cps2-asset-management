CREATE TABLE `users` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(191) NOT NULL,
	`email` varchar(191) NOT NULL UNIQUE,
	`email_verified_at` TIMESTAMP DEFAULT 'NULL',
	`password` varchar(191) NOT NULL,
	`remember_token` varchar(100) DEFAULT 'NULL',
	`created_at` TIMESTAMP DEFAULT 'NULL',
	`updated_at` TIMESTAMP DEFAULT 'NULL',
	`status` int NOT NULL DEFAULT '0',
	`address` varchar(191),
	`image_path` varchar(191),
	`role` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `password_resets` (
	`email` varchar(191) NOT NULL,
	`token` varchar(191) NOT NULL,
	`created_at` TIMESTAMP DEFAULT 'NULL'
);

CREATE TABLE `items` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(191) NOT NULL,
	`description` varchar(191) NOT NULL,
	`created_at` TIMESTAMP DEFAULT 'NULL',
	`updated_at` TIMESTAMP DEFAULT 'NULL',
	`image_path` varchar(191) NOT NULL UNIQUE,
	`price` bigint NOT NULL,
	`quantity` bigint NOT NULL,
	`status` int NOT NULL,
	`category_id` bigint NOT NULL,
	`user_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `roles` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(191) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar NOT NULL UNIQUE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `item_serial` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`serial` varchar(191) NOT NULL UNIQUE,
	`status` varchar(191) NOT NULL UNIQUE,
	`item_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `transactions` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`transaction_code` varchar(191) NOT NULL,
	`user_id` bigint NOT NULL,
	`item_id` bigint NOT NULL,
	`status_id` bigint NOT NULL,
	`payment_mode_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `statuses` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(191) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `payment_modes` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(191) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role`) REFERENCES `roles`(`id`);

ALTER TABLE `items` ADD CONSTRAINT `items_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`);

ALTER TABLE `items` ADD CONSTRAINT `items_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `item_serial` ADD CONSTRAINT `item_serial_fk0` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);

ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk1` FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);

ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk2` FOREIGN KEY (`status_id`) REFERENCES `statuses`(`id`);

ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk3` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes`(`id`);

