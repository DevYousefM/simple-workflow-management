<?php

namespace Modules\Workflow\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class StepsOrder implements ValidationRule
{
    public function passes($attribute, $value)
    {
        if (!is_array($value)) {
            return false;
        }
        $orders = array_map(function ($step) {
            return $step['order'];
        }, $value);
        if (count($orders) !== count(array_unique($orders))) {
            return false;
        }

        sort($orders);
        $expectedOrder = 1;
        foreach ($orders as $order) {
            if (intdiv($order, 1) !== $expectedOrder) {
                return false;
            }
            $expectedOrder++;
        }

        return true;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->passes($attribute, $value)) {
            $fail('The steps must be a sequential list starting from 1 without any gaps or duplicates.');
        }
    }
}
