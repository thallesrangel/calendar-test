<?php

namespace App\Services\Rules;

trait CheckHasBeenVerifiedTrait
{
    public function checkHasBeenVerified($class)
    {
        if ($class) {
            foreach($class as $item) {
                if ($item['people_id'] == session('people.id')) {
                    return true;
                }
            }
        }
    }
}
