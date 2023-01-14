<?php

namespace App\Http\Controllers\Health;

class Alive
{
    public function __invoke()
    {
        return 'Hello';
    }
}
