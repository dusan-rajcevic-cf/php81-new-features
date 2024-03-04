<?php

namespace App\Helpers;

use Exception;

class Finalizer
{
    public function dumpAndDie(string $message): never
    {
        dump($message);
        die();
    }

    /**
     * @throws Exception
     */
    public function dumpAndThrowException(string $message): never
    {
        dump($message);
        throw new Exception($message);
    }
}
