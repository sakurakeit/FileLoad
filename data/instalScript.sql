CREATE DATABASE fileload;

CREATE TABLE `tbl_user` (
`id` int(11) NOT NULL auto_increment,
`email` varchar(32) collate utf8_unicode_ci NOT NULL default '',
`password` varchar(32) collate utf8_unicode_ci NOT NULL default '',
PRIMARY KEY  (`id`),
UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_files` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`path` VARCHAR( 255 ) ,
`user_id` int(11),
`date_load` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`name_file` VARCHAR( 255 )
) ENGINE = InnoDB;

INSERT INTO tbl_user ( email, password) VALUES('admin@admin', md5('admin'));
