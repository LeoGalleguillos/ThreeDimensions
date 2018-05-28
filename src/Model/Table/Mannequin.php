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
        int $userId = null,
        string $subject,
        string $message = null
    ) : int {
        $sql = '
            INSERT
              INTO `cube` (
                   `user_id`, `subject`, `message`, `created`
                   )
            VALUES (:userId, :subject, :message, UTC_TIMESTAMP())
                 ;
        ';
        $parameters = [
            'userId'       => $userId,
            'subject'     => $subject,
            'message' => $message,
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

    public function updateViewsWhereThreeDimensionsId(int $cubeId) : bool
    {
        $sql = '
            UPDATE `cube`
               SET `cube`.`views` = `cube`.`views` + 1
             WHERE `cube`.`cube_id` = :cubeId
                 ;
        ';
        $parameters = [
            'cubeId' => $cubeId,
        ];
        return (bool) $this->adapter->query($sql, $parameters)->getAffectedRows();
    }
}
