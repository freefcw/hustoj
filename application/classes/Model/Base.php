<?php
/**
 * @author: freefcw
 * Date: 12/27/13
 * Time: 10:07 AM
 */

abstract class Model_Base extends Model_Database implements ArrayAccess
{
    static $cols = array();

    static $primary_key = '';

    static $table = '';

    const ORDER_DESC  = 'DESC';
    const ORDER_ASC   = 'ASC';
    const DEFUNCT_YES = 'Y';
    const DEFUNCT_NO  = 'N';

    public function __construct($db = null)
    {
        parent::__construct($db);

        if ( ! isset($this->{static::$primary_key}) )
        {
            $this->initial_data();
        }
    }

    /**
     * 过滤无效的数据, '', 0
     *
     * @param       $data array
     * @param array $filters
     *
     * @return array
     */
    public static function clean_data($data, $filters = array('', NULL))
    {
        $ret = array();
        foreach($data as $key => $value)
        {
            if ( ! in_array($value, $filters) )
                $ret[$key] = $value;
        }

        return $ret;
    }

    //////////////////////////////////////////
    //            ArrayAccess
    //////////////////////////////////////////

    public function offsetSet($offset, $value)
    {
        if ( $offset )
            $this->$offset = $value;
        else
            throw new Exception('Not such key!');
    }

    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    public function offsetUnset($offset) {
        unset($this->$offset);
    }

    public function offsetGet($offset) {
        return isset($this->$offset) ? $this->$offset : null;
    }

    /**
     * 通过primary_key查找
     *
     * @param string $id 主键id
     *
     * @return Model_Base|Model_Code|Model_Problem|Model_User|Model_Topic|Model_Solution|Model_Mail|Model_News
     */
    public static function find_by_id($id)
    {
        if ( ! $id ) return null;
        $result = DB::select()->from(static::$table)->where(static::$primary_key, '=', $id)->as_object(get_called_class())->execute();
        return $result->current();
    }

    /**
     *
     * 通过简单的过滤器查找数据
     *
     * @param array $filters
     * @param int   $page
     * @param int   $limit
     * @param array $orderby
     *
     * @return Model_Base[]|Model_Code[]|Model_Problem[]|Model_User[]|Model_Topic[]
     */
    public static function find($filters, $page = 1, $limit = 50, $orderby=array())
    {
        $query = DB::select()->from(static::$table);
        foreach($filters as $col => $value)
        {
            $query->where($col, '=', $value);
        }
        if ( $limit ) $query->limit($limit);
        if ( $page ) $query->offset( $limit * ($page - 1));

        foreach($orderby as $col => $order)
        {
            $query->order_by($col,  $order);
        }

        $result = $query->as_object(get_called_class())->execute();

        return $result->as_array();
    }

    /**
     *
     * 统计数目
     * 主要注意的是innodb的count性能不如myisam
     *
     * @param array $filters
     *
     * @return int
     */
    public static function count($filters = array())
    {
        $query = DB::select(array(DB::expr('COUNT(*)'), 'total'))
                   ->from(static::$table);

        foreach($filters as $col => $value)
        {
            $query->where($col, '=', $value);
        }

        $result = $query->execute();
        $item = $result->current();
        return $item['total'];
    }


    /**
     * 删除当前数据，只针对实例
     *
     * @return int
     */
    public function destroy()
    {
        $query = DB::delete(static::$table)->where(static::$primary_key, '=', $this->{static::$primary_key});
        return $query->execute();
    }

    /**
     * 删除指定数据
     *
     * @param array $condition
     *
     * @throws Kohana_Exception
     * @return int 返回执行后结果
     */
    public static function delete($condition = array())
    {
        if ( $condition )
        {
            $query = DB::delete(static::$table);

            foreach($condition as $col => $val)
            {
                $query->where($col, '=', $val);
            }
            return $query->execute();
        }
        throw new Kohana_Exception('Condition can not be empty array');
    }

    /**
     * 是否为死亡数据
     *
     * @return bool
     */
    public function is_defunct()
    {
        if ( in_array('defunct', static::$cols))
            return $this['defunct'] == self::DEFUNCT_YES;
        return false;
    }

    /**
     * 更新数据
     *
     * @param $data
     *
     * @return bool
     */
    public function update($data)
    {
        foreach($data as $k => $v)
        {
            if ( in_array($k, static::$cols) )
                $this->$k = $v;
        }
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

        if ( isset($this->{static::$primary_key}) and $this->{static::$primary_key})
        {
            // if primary key exist, then update, contain primary key, haha
            $primary_id = $this->{static::$primary_key};
            //            unset($this->data[static::$primary_key]);

            $query = DB::update(static::$table)->set($data)->where(static::$primary_key, '=', $primary_id);
            $ret   = $query->execute();

            return $ret;
        } else
        {
            // else save new record
            $keys   = array_keys($data);
            $values = array_values($data);

            list($id, $affect_row) = DB::insert(static::$table, $keys)->values($values)->execute();

            $this->{static::$primary_key} = $id;

            return $affect_row;
        }
    }

    /**
     *
     * 把当前数据dump一份
     *
     * @return string 返回编码后的json数据
     */
    public function json_dump()
    {
        return json_encode($this->raw_array());
    }

    public function raw_array()
    {
        $data = array();
        foreach(static::$cols as $col)
        {
            $data[$col] = $this->$col;
        }
        return $data;
    }

    abstract protected function initial_data();

    /**
     * 校检数据是否正确
     *
     * @return mixed
     */
    abstract public function validate();

}