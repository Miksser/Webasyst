<?php

/**
 * В классе реализован функционал позволяющий более быстро генерировать запросы к бд
 * Class DataBaseFunction
 */

class DataBaseFunction extends PDO
{
    /**
     * Getting information from the database
     * @param $table - table name
     * @param string $rows
     * @param null $join
     * @param null $where
     * @param null $order
     * @return bool
     */
    function select($table, $rows = '*', $join = null, $where = null, $order = null)
    {
        $q = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($join != null)

            foreach ($join as list($tableJoin, $columnJoin)) {
                $q .= ' LEFT JOIN ' . $tableJoin . ' ON ' . $columnJoin;
            };

        if ($where != null)
            $q .= ' WHERE ' . $where;
        if ($order != null)
            $q .= ' ORDER BY ' . $order;

        $stmt = self::query($q);
        $result = $stmt->fetchAll();

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }

    /**
     * Insert new info from DB
     * @param $info $_POST request
     * @return bool
     *
     */
    public function insert($info)
    {
        if (isset($info['table'])) {
            $table = $info['table'];
            unset($info['table']);
        } else {
            return false;
        }

        $column = implode(', ', array_keys($info));
        $ph = null;

        $arrayLength = count($info);

        foreach (array_keys($info) as $item) {
            if (!--$arrayLength) {
                $ph .= ':' . $item . '';
                break;
            }
            $ph .= ':' . $item . ', ';
        }

        $q = 'INSERT INTO ' . $table . " ($column)" . ' VALUES ' . "($ph)";
        $stmt = self::prepare($q);
        $stmt->execute($info);

    }
}