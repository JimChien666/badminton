CREATE DATABASE IF NOT EXISTS `badminton`;

CREATE TABLE IF NOT EXISTS `badminton`.`users` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `level` bigint(18) COLLATE utf8mb4_unicode_ci NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `badminton`.`password_resets` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `badminton`.`playing_groups` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `main_user_id` bigint(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `per_price` bigint(18) COLLATE utf8mb4_unicode_ci  NOT NULL DEFAULT 100,
    `min_level` bigint(18) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 1,
    `max_level` bigint(18) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 1,
    `member_size` bigint(18) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `main_user_id_unique` (`main_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `badminton`.`group_players` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` bigint(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `playing_group_id` bigint(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `level` bigint(18) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 1,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_id_unique` (`user_id`),
    UNIQUE KEY `playing_group_id_unique` (`playing_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

