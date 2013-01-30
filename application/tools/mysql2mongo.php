<?php
/**
 * User: freefcw
 * Date: 12-1-8
 * Time: 上午12:22
 */

$mysql = new mysqli('localhost', 'root', 'hejun', 'judge');
// if translated the db charset
//$mysql->set_charset('utf8');

if ($mysql->connect_errno) {
    printf("Connect failed: %s\n", $mysql->connect_error);
    exit();
}

$m = new Mongo();
$db = $m->selectDB('judge');

error_reporting(E_ALL);
// translate_problem();
// translate_users();
// translate_login_log();
// translate_solutions();
// translate_contest();
translate_topic();
translate_reply();

function translate_problem()
{
    global $mysql, $db;

    $offset = 0;
    $newdb = $db->selectCollection('problem');

    $sql = 'SELECT * FROM problem';
    $result = $mysql->query($sql);

    while ($item = $result->fetch_assoc()) {
        $data = array(
            'problem_id'      => intval($item['problem_id']),
            'title'           => $item['title'],
            'description'     => $item['description'],
            'input'           => $item['input'],
            'output'          => $item['output'],
            'sample_input'    => $item['sample_input'],
            'sample_output'   => $item['sample_output'],
            'sample_code'     => $item['sample_Program'],
            'spj'             => (boolean)$item['spj'],
            'hint'            => $item['hint'],
            'source'          => $item['source'],
            'add_date'        => new MongoDate(strtotime($item['in_date'])),
            'memory_limit'    => intval($item['memory_limit']),
            'time_limit'      => intval($item['time_limit']),
            'accepted'        => intval($item['accepted']),
            'submit'          => intval($item['submit']),
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

    while ($item = $result->fetch_assoc()) {
        $data = array(
            'contest_id'  => intval($item['contest_id']),
            'title'       => $item['title'],
            'description' => $item['description'],
            'start_time'  => new MongoDate(strtotime($item['start_time'])),
            'end_time'    => new MongoDate(strtotime($item['end_time'])),
            'private'     => (boolean)$item['private']
        );
        $newdb->save($data);
    }
    $result->free();

    $sql = 'SELECT * FROM contest_problem ORDER BY contest_id';
    $result = $mysql->query($sql);

    $last_contest = 0;
    while ($item = $result->fetch_assoc()) {
        if ($item['contest_id'] != $last_contest) {
            if ($last_contest != 0) {
                $ret = $newdb->update(
                    array('contest_id' => intval($item['contest_id'])), array('$set' => array('plist' => $data))
                );

            }
            $last_contest = $item['contest_id'];
            $data = array();
        }
        // need update problem_id to _id
        $tmp = $db->problem->findOne(array('problem_id' => intval($item['problem_id'])));
        $data[intval($item['num'])] = array('p_id' => $tmp['_id'], 'title' => $tmp['title']);
    }
    $result->free();
}


function translate_solutions()
{
    global $mysql, $db;

    $offset = 0;
    $newdb = $db->selectCollection('solution');

    $sql
        = "SELECT solution.solution_id AS solution_id, problem_id, user_id, time, memory, in_date, result, language,
         ip, contest_id, num, judgetime, code_length, source
         FROM solution, source_code
         WHERE solution.solution_id = source_code.solution_id
         ORDER BY solution_id";

    $offset = $offset + 1000;

    $result = $mysql->query($sql);

    while ($item = $result->fetch_assoc()) {
        $data = array(
            'solution_id' => intval($item['solution_id']),
            'problem_id'  => intval($item['problem_id']),
            'user_id'     => $item['user_id'],
            'time'        => intval($item['time']),
            'memory'      => intval($item['memory']),
            'add_date'    => new MongoDate(strtotime($item['in_date'])),
            'result'      => intval($item['result']),
            'language'    => intval($item['language']),
            'ip'          => $item['ip'],
            'contest_id'  => intval($item['contest_id']),
            'num'         => intval($item['num']),
            'judge_time'  => new MongoDate(strtotime($item['judgetime'])),
            'code_length' => intval($item['code_length']),
            'source'      => $item['source'],
        );
        $newdb->save($data);
    }
    $result->close();

    $sql = 'SELECT * FROM compileinfo';
    $result = $mysql->query($sql);

    while ($item = $result->fetch_assoc()) {
        $newdb->update(
            array('solution_id' => intval($item['solution_id'])),
            array('$set' => array('compileinfo' => $item['error']))
        );
    }
    $result->free();
}

function translate_login_log()
{
    global $mysql, $db;

    $result = $mysql->query('SELECT * FROM loginlog');
    $newdb = $db->selectCollection('logs');

    while ($item = $result->fetch_assoc()) {
        $data = array(
            'type'     => 'login', //login, changepassword, add, delete...or?
            'user_id'  => $item['user_id'],
            'password' => $item['password'],
            'ip'       => $item['ip'],
            'time'     => new MongoDate(strtotime($item['time'])),
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

    while ($user = $result->fetch_assoc()) {
        $data = array(
            'user_id'     => $user['user_id'],
            'nick'        => $user['nick'],
            'email'       => $user['email'],
            'school'      => $user['school'],
            'submit'      => intval($user['submit']),
            'solved'      => intval($user['solved']),
            'ip'          => $user['ip'],
            'access_time' => new MongoDate(strtotime($user['accesstime'])),
            'language'    => intval($user['language']),
            'disabled'    => false,
            'intro'       => '',
            'password'    => $user['password'],
            'reg_time'    => new MongoDate(strtotime($user['reg_time'])),
        );
        //var_dump($data);
        $newuser->save($data);
    }
    $result->free();
}

function translate_topic()
{
    global $mysql, $db;

    $result = $mysql->query('SELECT * FROM topic');
    $newitem = $db->selectCollection('topic');

    while ($item = $result->fetch_assoc()) {
        $topic_id = intval($item['tid']);
        $data = array(
            'topic_id'    => $topic_id,
            'title'       => $item['title'],
            'status'      => $item['top_level'],
            'cid'         => intval($item['cid']),
            'pid'         => intval($item['pid']),
            'user_id'     => $item['author_id'],
            'reply_count' => 0,
        );
        //var_dump($data);
        $newitem->save($data);
    }
    $result->free();
}

function mtime($mtime)
{
    if ($mtime) {
        return date('Y-m-d h:i:s', $mtime->sec);
    }
    return '';
}

function update_topic_time($topic_id, $date, $content)
{
    global $db;

    $tdb = $db->selectCollection('topic');

    $item = $tdb->findOne(array('topic_id' => $topic_id));

    if ($item) {

        if (!array_key_exists('date', $item)) {
            $item['date'] = $date;
            $item['content'] = $content;
        }

        if (!array_key_exists('last_reply', $item)) {
            $item['last_reply'] = $date;
        } else {
            if ($item['last_reply'] < $date) {
                $item['reply_count'] = $item['reply_count'] + 1;

                $item['last_reply'] = $date;
            }
        }

        dump($item);

        $tdb->save($item);
    } else {
        echo "Not found {$topic_id}, {$content}!\n";
    }
}

function dump($item)
{
    echo "ITEM:\n";
    echo 'topic_id:', $item['topic_id'], "\n";
    echo 'title   :', $item['title'], "\n";
    echo 'date    :', mtime($item['date']), "\n";
    echo 'last    :', mtime($item['last_reply']), "\n";
    echo 'count   :', $item['reply_count'], "\n";
    echo "\n";
}

function translate_reply()
{
    global $mysql, $db;

    $result = $mysql->query('SELECT * FROM reply ORDER BY `time` ASC');
    $newitem = $db->selectCollection('reply');

    while ($item = $result->fetch_assoc()) {
        $time = new MongoDate(strtotime($item['time']));
        $topic_id = intval($item['topic_id']);
        $data = array(
            'reply_id' => intval($item['rid']),
            'content'  => $item['content'],
            'status'   => $item['status'],
            'topic_id' => $topic_id,
            'user_id'  => $item['author_id'],
            'ip'       => '',
            'time'     => $time,
        );
        //var_dump($data);
        update_topic_time($topic_id, $time, $item['content']);
        $newitem->save($data);
    }
    $result->free();
}