<?php
/**
 * Ascetic-CMS
 */

namespace AsceticCMS;

class App 
{
    const VERSION = '0.1.1';
    public function showInfo()
    {
        return $this->VERSION;
    }
}