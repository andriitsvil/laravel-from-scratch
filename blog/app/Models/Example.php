<?php

namespace App\Models;


/**
 * Class Example
 * @package App\Models
 */
class Example
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function handle(): void
    {
        die('It works');
    }
}
