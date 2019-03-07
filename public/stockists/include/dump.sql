CREATE TABLE IF NOT EXISTS `store_locator` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NULL,
  `post_id` bigint(20) NULL,
  `category_id` int(11) NULL,
  `name` varchar(160) NULL,
  `logo` varchar(255) NULL,
  `address` varchar(160) NULL,
  `lat` varchar(20) NULL,
  `lng` varchar(20) NULL,
  `url` varchar(160) NULL,
  `description` text NULL,
  `tel` varchar(30) NULL,
  `email` varchar(60) NULL,
  `city` varchar(60) NULL,
  `country` varchar(60) NULL,
  `created` datetime NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `store_locator_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NULL,
  `marker_icon` varchar(255) NULL,
  `image` varchar(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;