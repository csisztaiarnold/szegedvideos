DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `video_id` varchar(1000) NOT NULL,
  `published_at` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` mediumtext NOT NULL,
  `thumbnail_default_url` varchar(1000) NOT NULL,
  `thumbnail_default_width` varchar(1000) NOT NULL,
  `thumbnail_default_height` varchar(1000) NOT NULL,
  `thumbnail_medium_url` varchar(1000) NOT NULL,
  `thumbnail_medium_width` varchar(1000) NOT NULL,
  `thumbnail_medium_height` varchar(1000) NOT NULL,
  `thumbnail_high_url` varchar(1000) NOT NULL,
  `thumbnail_high_width` varchar(1000) NOT NULL,
  `thumbnail_high_height` varchar(1000) NOT NULL,
  `channel_id` varchar(1000) NOT NULL,
  `channel_title` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;
