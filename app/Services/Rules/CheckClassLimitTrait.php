<?php

namespace App\Services\Rules;

trait CheckClassLimitTrait
{
    public function counterStudentCheckIn($class)
    {
        foreach($class as $classKey => $classValue) {
            $cnt = count(array_filter($classValue['checker'], function($item) {
                return $item['flag_status'] == 'checkin';
            }));

            $class[$classKey]['busy'] = $cnt;

            foreach($classValue['checker'] as $item) {
                if ($item['flag_status'] == 'checkin') {
                    $class[$classKey]['checkIn'] = 'checkin';
                }
            }
        }

        return $class;
    }
}
