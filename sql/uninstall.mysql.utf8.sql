-- $Id: uninstall.mysql.utf8.sql 24 2009-11-09 11:56:31Z chdemko $

DROP TABLE IF EXISTS `#__localise`;

DELETE FROM `#__assets` WHERE `name` LIKE 'com_localise%';

