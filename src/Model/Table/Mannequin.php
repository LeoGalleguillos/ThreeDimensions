<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Table;

use Exception;
use Generator;
use Zend\Db\Adapter\Adapter;

class Mannequin
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int
     */
    public function insert(
        int $userId
    ) : int {
        $sql = '
            INSERT
              INTO `mannequin` (
                   `user_id`
                   )
            VALUES (?)
                 ;
        ';
        $parameters = [
            $userId,
        ];
        return $this->adapter
                    ->query($sql)
                    ->execute($parameters)
                    ->getGeneratedValue();
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `mannequin`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }

    public function selectCountWhereUserId(int $userId)
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `mannequin`
             WHERE `user_id` = ?
                 ;
        ';
        $parameters = [
            $userId,
        ];
        $row = $this->adapter->query($sql)->execute($parameters)->current();
        return (int) $row['count'];
    }

    /**
     * Select where user ID.
     *
     * @param int $userId
     * @return array
     */
    public function selectWhereUserId(int $userId) : array
    {
        $sql = '
            SELECT `mannequin`.`mannequin_id`
                 , `mannequin`.`user_id`
                 , `mannequin`.`translate_x`
                 , `mannequin`.`translate_y`
                 , `mannequin`.`translate_z`
                 , `mannequin`.`rotate_x`
                 , `mannequin`.`rotate_y`
                 , `mannequin`.`rotate_z`
                 , `mannequin`.`transform_origin_x`
                 , `mannequin`.`transform_origin_y`
                 , `mannequin`.`transform_origin_z`
                 , `mannequin`.`distance_traveled`
                 , `mannequin`.`created`
                 , `mannequin`.`updated`
              FROM `mannequin`
             WHERE `user_id` = ?
                 ;
        ';
        $parameters = [
            $userId,
        ];
        return $this->adapter->query($sql)->execute($parameters)->current();
    }

    public function updateWhereUserId(
        float $translateX,
        float $translateY,
        float $translateZ,
        float $rotateX,
        float $rotateY,
        float $rotateZ,
        float $transformOriginX,
        float $transformOriginY,
        float $transformOriginZ,
        float $distanceTraveled,
        int $userId
    ) : bool {
        $sql = '
            UPDATE `mannequin`
               SET `translate_x` = ?
                 , `translate_y` = ?
                 , `translate_z` = ?
                 , `rotate_x` = ?
                 , `rotate_y` = ?
                 , `rotate_z` = ?
                 , `transform_origin_x` = ?
                 , `transform_origin_y` = ?
                 , `transform_origin_z` = ?
                 , `distance_traveled` = ?
                 , `updated` = CURRENT_TIMESTAMP()
             WHERE `user_id` = ?
                 ;
        ';
        $parameters = [
            $translateX,
            $translateY,
            $translateZ,
            $rotateX,
            $rotateY,
            $rotateZ,
            $transformOriginX,
            $transformOriginY,
            $transformOriginZ,
            $distanceTraveled,
            $userId,
        ];
        return (bool) $this->adapter
                           ->query($sql)
                           ->execute($parameters)
                           ->getAffectedRows();
    }
}
