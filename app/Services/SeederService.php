<?php

namespace App\Services;

class SeederService
{
    /**
     * Avoid generating duplicate item when seeding database
     * 
     * $object Object instance (eg: App\User::class)
     * $index Field name wich is used to compare data will be add to database (eg: email)
     * $data Array of items to be created (eg: ["name" => "user", "email" => "user@mail.com"] )
     */
    public static function seed($object, $index, $data = [])
    {
        foreach ($data as $item) {
            $obj = $object::where($index, $item[$index])->first();
            if ($obj === null) {
                $result = $object::create($item);
                echo "Created: " . $result . "\n";
            }
        }
    }
}
