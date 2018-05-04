<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Filters extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('jraw', [self::class, 'jrawFilter'], ['is_safe' => ['html']])
        ];
    }

    public static function jrawFilter($value)
    {
        return json_encode($value);
    }
}