<?php

namespace App\Services\Rules;

trait checkIfLessMinutesTrait
{
    public function checkIfLessThirtyMinutes($class)
    {
        if ($class) {
            foreach($class as $item) {
                $date_time_start = new \DateTime($item->classes->date_time_start);
                $since_start = $date_time_start->diff(new \DateTime(now()));
                
                if ($since_start->i > 30) {
                    return true;
                }
            }
        }
    }
}
