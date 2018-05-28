CREATE TABLE `mannequin` (
    `mannequin_id` int(10) unsigned auto_increment,
    `user_id` int(10) not null,
    `created` datetime not null,
    `updated` datetime default null,
    PRIMARY KEY (`mannequin_id`)
) charset=utf8;
