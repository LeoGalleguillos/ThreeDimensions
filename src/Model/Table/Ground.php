<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Table;

use Exception;
use Generator;
use Zend\Db\Adapter\Adapter;

class Ground
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
              INTO `ground` (
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
              FROM `ground`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }

    public function selectCountWhereUserId(int $userId)
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `ground`
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
            SELECT `ground`.`ground_id`
                 , `ground`.`user_id`
                 , `ground`.`translate_x`
                 , `ground`.`translate_y`
                 , `ground`.`translate_z`
                 , `ground`.`rotate_x`
                 , `ground`.`rotate_y`
                 , `ground`.`rotate_z`
                 , `ground`.`transform_origin_x`
                 , `ground`.`transform_origin_y`
                 , `ground`.`transform_origin_z`
                 , `ground`.`created`
                 , `ground`.`updated`
              FROM `ground`
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
        int $userId
    ) : bool {
        $sql = '
            UPDATE `ground`
               SET `translate_x` = ?
                 , `translate_y` = ?
                 , `translate_z` = ?
                 , `rotate_x` = ?
                 , `rotate_y` = ?
                 , `rotate_z` = ?
                 , `transform_origin_x` = ?
                 , `transform_origin_y` = ?
                 , `transform_origin_z` = ?
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
            $userId,
        ];
        return (bool) $this->adapter
                           ->query($sql)
                           ->execute($parameters)
                           ->getAffectedRows();
    }
}
