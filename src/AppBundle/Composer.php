<?php

namespace AppBundle;


class Composer extends \Sensio\Bundle\DistributionBundle\Composer\ScriptHandler {
    
    
    /**
     * Update database.
     *
     * @param Event $event
     */
    public static function postDeploymentExec($event)
    {
        $consoleDir = static::getConsoleDir($event, 'Update Database');
        
        if (null === $consoleDir) {
            return;
        }
        
        static::executeCommand($event, $consoleDir, 'doctrine:schema:update --force');
    }
    
}