<?php
/**
 * Created by PhpStorm.
 * User: junhe
 * Date: 14-3-13
 * Time: 下午5:29
 */

class eTest extends Unittest_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function test_site_name()
    {
        $this->assertSame('HUSTOJ', e::get_website_name());
    }

    /**
     * @dataProvider providerCPID
     */
    public function test_contest_problem_id($pid, $expect)
    {
        $this->assertSame($expect, e::contest_pid($pid));
    }

    public function providerCPID()
    {
        return array(
            array(0, 'A'),
            array(1, 'B'),
            array(2, 'C'),
            array(3, 'D'),
            array(4, 'E'),
        );
    }

    public function test_contest_time()
    {
        ob_start();
        e::the_contest_time(3661);
        $content = ob_get_contents();
        ob_end_clean();
        $this->assertSame('01:01:01', $content);
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}