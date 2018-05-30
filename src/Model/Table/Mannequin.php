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
              FROM `cube`
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

    public function selectOrderByCreatedDesc() : Generator
    {
        $sql = '
            SELECT `cube`.`cube_id`
                 , `cube`.`user_id`
                 , `cube`.`subject`
                 , `cube`.`message`
                 , `cube`.`created`
                 , `cube`.`views`
              FROM `cube`
             ORDER
                BY `cube`.`created` DESC
             LIMIT 100
                 ;
        ';
        foreach ($this->adapter->query($sql)->execute() as $row) {
            yield($row);
        }
    }

    /**
     * Select where cube ID.
     *
     * @param int $cubeId
     * @return array
     */
    public function selectWhereThreeDimensionsId(int $cubeId) : array
    {
        $sql = '
            SELECT `cube`.`cube_id`
                 , `cube`.`user_id`
                 , `cube`.`subject`
                 , `cube`.`message`
                 , `cube`.`created`
                 , `cube`.`views`
              FROM `cube`
             WHERE `cube`.`cube_id` = :cubeId
             ORDER
                BY `cube`.`created` ASC
                 ;
        ';
        $parameters = [
            'cubeId' => $cubeId,
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
