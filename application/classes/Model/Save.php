<?php
/**
 * @author: freefcw
 * Date: 1/3/14
 * Time: 2:08 PM
 */

abstract class Model_Save extends Model_Base
{

    /**
     * @param string $id
     *
     * @return Model_Code
     */
    public static function find_by_id($id)
    {
        $filter = array(
            'solution_id' => $id,
        );
        $result = self::find($filter);
        if ($result)
            return $result[0];

        return null;
    }

    /**
     * 保存当前实例到数据库
     *
     * @return int
     */
    public function save()
    {
        // prepare data
        //        $this->data['update_at'] = PP::format_time();

        // 过滤不存在的数据
        $data = $this->raw_array();

        // else save new record
        $keys   = array_keys($data);
        $values = array_values($data);

        $query  = DB::insert(static::$table, $keys)->values($values);

        $query->execute();
    }
}