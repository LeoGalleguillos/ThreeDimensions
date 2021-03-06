CREATE TABLE `mannequin` (
    `mannequin_id` int(10) unsigned auto_increment,
    `user_id` int(10) unsigned not null,
    `translate_x` FLOAT(8, 2) SIGNED,
    `translate_y` FLOAT(8, 2) SIGNED,
    `translate_z` FLOAT(8, 2) SIGNED,
    `rotate_x` FLOAT(8, 2) SIGNED,
    `rotate_y` FLOAT(8, 2) SIGNED,
    `rotate_z` FLOAT(8, 2) SIGNED,
    `transform_origin_x` FLOAT(8, 2) SIGNED,
    `transform_origin_y` FLOAT(8, 2) SIGNED,
    `transform_origin_z` FLOAT(8, 2) SIGNED,
    `distance_traveled` FLOAT(8, 2) UNSIGNED,
    `created` datetime not null default CURRENT_TIMESTAMP(),
    `updated` datetime default null,
    PRIMARY KEY (`mannequin_id`)
) charset=utf8;
