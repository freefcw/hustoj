<?php
/**
 * User: freefcw
 * Date: 12-1-8
 * Time: 上午12:22
 */

$mysql = new mysqli('localhost', 'root', 'hejun', 'judge');
$mysql->set_charset('utf8');

$m = new Mongo();
$db = $m->selectDB('judge');
error_reporting(E_ALL);
translate_problem();
translate_users();
translate_login_log();
translate_solutions();
translate_contest();


function translate_problem()
{
    global $mysql, $db;

    $offset = 0;
    $newdb = $db->selectCollection('problem');

    $sql = 'SELECT * FROM problem';
    $result = $mysql->query($sql);

    while($item = $result->fetch_assoc())
    {
        $data = array(
            'problem_id' => intval($item['problem_id']),
            'title' => $item['title'],
            'description' => $item['description'],
            'input' => $item['input'],
            'output' => $item['output'],
            'sample_input' => $item['sample_input'],
            'sample_output' => $item['sample_output'],
            'sample_code' => $item['sample_Program'],
            'spj' => (boolean)$item['spj'],
            'hint' => $item['hint'],
            'source' => $item['source'],
            'add_date' => new MongoDate(strtotime($item['in_date'])),
            'memory_limit' => intval($item['memory_limit']),
            'time_limit' => intval($item['time_limit']),
            'accepted' => intval($item['accepted']),
            'submit' => intval($item['submit']),
            'case_time_limit' => intval($item['case_time_limit']),
        );
        $newdb->save($data);
    }
    $result->free();
}


function translate_contest()
{
    global $mysql, $db, $m;

    $newdb = $db->selectCollection('contest');

    $sql = 'SELECT * FROM contest';
    $result = $mysql->query($sql);

    while($item = $result->fetch_assoc())
    {
        $data = array(
            'contest_id' => intval($item['contest_id']),
            'title' => $item['title'],
            'description' => $item['description'],
            'start_time' => new MongoDate(strtotime($item['start_time'])),
            'end_time' => new MongoDate(strtotime($item['end_time'])),
            'private' => (boolean)$item['private']
        );
        $newdb->save($data);
    }
    $result->free();

    $sql = 'SELECT * FROM contest_problem ORDER BY contest_id';
    $result = $mysql->query($sql);

    $last_contest = 0;
    while($item = $result->fetch_assoc())
    {
        if ($item['contest_id'] != $last_contest)
        {
            if ($last_contest != 0){
                $ret = $newdb->update(array('contest_id'=> intval($item['contest_id'])), array('$set' => array('plist' => $data)));

            }
            $last_contest = $item['contest_id'];
            $data = array();
        }
        // need update problem_id to _id
        $tmp = $db->problem->findOne(array('problem_id'=> intval($item['problem_id'])));
        $data[intval($item['num'])] = array('p_id'=> $tmp['_id'], 'title'=>$tmp['title']);
    }
    $result->free();
}


function translate_solutions()
{
    global $mysql, $db;

    $offset = 0;
    $newdb = $db->selectCollection('solution');

    $sql = "SELECT solution.solution_id AS solution_id, problem_id, user_id, time, memory, in_date, result, language,
         ip, contest_id, num, judgetime, code_length, source
         FROM solution, source_code
         WHERE solution.solution_id = source_code.solution_id
         ORDER BY solution_id";

    $offset = $offset + 1000;

    $result = $mysql->query($sql);

    while($item = $result->fetch_assoc())
    {
        $data = array(
            'solution_id' => intval($item['solution_id']),
            'problem_id' => intval($item['problem_id']),
            'user_id' => $item['user_id'],
            'time' => intval($item['time']),
            'memory' => intval($item['memory']),
            'add_date' => new MongoDate(strtotime($item['in_date'])),
            'result' => intval($item['result']),
            'language' => intval($item['language']),
            'ip' => $item['ip'],
            'contest_id' => intval($item['contest_id']),
            'num' => intval($item['num']),
            'judge_time' => new MongoDate(strtotime($item['judgetime'])),
            'code_length' => intval($item['code_length']),
            'source' => $item['source'],
        );
        $newdb->save($data);
    }
    $result->close();

    $sql = 'SELECT * FROM compileinfo';
    $result = $mysql->query($sql);

    while($item = $result->fetch_assoc())
    {
        $newdb->update(array('solution_id' => intval($item['solution_id'])), array('$set'=>array('compileinfo'=>$item['error'])));
    }
    $result->free();
}

function translate_login_log()
{
    global $mysql, $db;

    $result = $mysql->query('SELECT * FROM loginlog');
    $newdb = $db->selectCollection('logs');

    while($item = $result->fetch_assoc())
    {
        $data = array(
            'type' => 'login', //login, changepassword, add, delete...or?
            'user_id' => $item['user_id'],
            'password' => $item['password'],
            'ip' => $item['ip'],
            'time' => new MongoDate(strtotime($item['time'])),
        );
        $newdb->save($data);
    }
    $result->free();
}


function translate_users()
{
    global $mysql, $db;

    $result = $mysql->query('SELECT * FROM users');
    $newuser = $db->selectCollection('user');

    while($user = $result->fetch_assoc())
    {
        $data = array(
            'user_id' => $user['user_id'],
            'nick' => $user['nick'],
            'email' => $user['email'],
            'school' => $user['school'],
            'submit' => intval($user['submit']),
            'solved' => intval($user['solved']),
            'ip' => $user['ip'],
            'access_time' => new MongoDate(strtotime($user['accesstime'])),
            'language' => intval($user['language']),
            'password' => $user['password'],
            'reg_time' => new MongoDate(strtotime($user['reg_time'])),
        );
        //var_dump($data);
        $newuser->save($data);
    }
    $result->free();
}

