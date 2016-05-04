<?php

namespace Garrinar\SiteAI\Actions;

abstract class Action
{
    public
        $active = true,
        $chanceToRun = 100, //in percents 0-100
        $runDaily = true,
        $runsPerDay = 10
    ;

    protected
        $generator;
    
    public function __construct($locale)
    {
        $this->generator = \Faker\Factory::create($locale);
    }
    
    abstract function run();
    
}