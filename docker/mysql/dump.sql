DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `task` varchar(255) NOT NULL,
    `completed` tinyint(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
