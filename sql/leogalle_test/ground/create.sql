CREATE TABLE `ground` (
    `ground_id` int(10) unsigned auto_increment,
    `background_color_rgb_r` INT(3) UNSIGNED,
    `background_color_rgb_g` INT(3) UNSIGNED,
    `background_color_rgb_b` INT(3) UNSIGNED,
    `rotate_x` FLOAT(8, 2) SIGNED,
    `rotate_y` FLOAT(8, 2) SIGNED,
    `rotate_z` FLOAT(8, 2) SIGNED,
    `translate_x` FLOAT(8, 2) SIGNED,
    `translate_y` FLOAT(8, 2) SIGNED,
    `translate_z` FLOAT(8, 2) SIGNED,
    `transform_origin_x` FLOAT(8, 2) SIGNED,
    `transform_origin_y` FLOAT(8, 2) SIGNED,
    `transform_origin_z` FLOAT(8, 2) SIGNED,
    `created` datetime not null default CURRENT_TIMESTAMP(),
    `updated` datetime default null,
    PRIMARY KEY (`ground_id`)
) charset=utf8;
