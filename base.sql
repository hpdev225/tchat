--
-- Structure de la table `tchat_message`
--

DROP TABLE IF EXISTS `tchat_message`;
CREATE TABLE IF NOT EXISTS `tchat_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tchat_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tchat_user_id` (`tchat_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Structure de la table `tchat_user`
--

DROP TABLE IF EXISTS `tchat_user`;
CREATE TABLE IF NOT EXISTS `tchat_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(225) NOT NULL,
  `password` varchar(200) NOT NULL,
  `connected` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:pas connecté et 1 connecté',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
