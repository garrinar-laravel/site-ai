<?php
/**
 * Created by PhpStorm.
 * User: Garrinar
 * Date: 30.04.2016
 * Time: 12:52
 */

namespace Garrinar\SiteAI;


use Exceptions\ActionRegisteredException;

abstract class SiteAI
{
    protected
        $locale = 'en_US',
        $actions = [],
        $chances = [],
        $shedules = [],
        $runResult = [];

    public function __construct()
    {
        
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function registerAction($className)
    {
        if(array_key_exists($className, $this->actions)) {
            throw new ActionRegisteredException("Action $className already registered");
        }
        $this->actions[$className] = new $className($this->locale);
    }

    final public function run()
    {
        /** @var Action $action */
        foreach ($this->actions as $action) {
            $this->runResult[] = $action->run();
        }
        
        return $this->getRunResult();
    }

    public function getRunResult()
    {
        return $this->runResult;
    }
}