<?php
/**
 * User: freefcw
 * Date: 12-1-2
 * Time: 下午5:54
 */

return array(
    'native' => array(
        'name' => 'hoj',
        'lifetime' => 43200,
    ),
    'cookie' => array(
        'name' => 'hoj',
        'encrypted' => TRUE,
        'lifetime' => 43200,
    ),
    'database' => array(
        'name' => 'hoj',
        'encrypted' => TRUE,
        'lifetime' => 43200,
        'group' => 'default',
        'table' => 'table_name',
        'columns' => array(
            'session_id'  => 'session_id',
            'last_active' => 'last_active',
            'contents'    => 'contents'
        ),
        'gc' => 500,
    ),
);