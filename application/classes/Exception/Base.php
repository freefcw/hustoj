<?php
/**
 * @author: freefcw
 * Date: 2/21/14
 * Time: 10:44 AM
 */

class Exception_Base extends Exception
{
    /**
     * @var string Error Page name
     */
    protected $template = 'error';

    public function __construct($message = "", $page = 'error')
    {
        $this->template = 'block/'. $page;

        parent::__construct($message);
    }

    /**
     * get template name
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
}