<?php

namespace App\Models;


/**
 * Class Example
 * @package App\Models
 */
class Example
{
    /**
     * @var Collaborator
     */
    protected $collaborator;

    protected $foo;

    public function __construct(Collaborator $collaborator, $foo)
    {
        $this->collaborator = $collaborator;
        $this->foo = $foo;
    }

    public function go(): void
    {
        dump('It works');
    }
}
