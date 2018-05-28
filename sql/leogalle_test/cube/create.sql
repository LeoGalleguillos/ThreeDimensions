CREATE TABLE `cube` (
    `cube_id` int(10) unsigned auto_increment,
    `subject` varchar(255) not null,
    `message` text,
    `views` int(10) unsigned NOT NULL DEFAULT '0',
    `created` datetime not null,
    PRIMARY KEY (`cube_id`)
) charset=utf8;
