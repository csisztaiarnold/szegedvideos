CREATE TABLE `videos` (
  `id` mediumint NOT NULL,
  `video_id` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `published_at` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_default_url` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_default_width` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_default_height` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_medium_url` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_medium_width` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_medium_height` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_high_url` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_high_width` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_high_height` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `channel_id` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `channel_title` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
