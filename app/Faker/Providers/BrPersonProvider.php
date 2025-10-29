<?php

namespace App\Faker\Providers;

use Faker\Provider\Base;

class BrPersonProvider extends Base
{
    public function cpf(bool $formatted = true): string
    {
        $n = [];
        for ($i = 0; $i < 9; $i++) {
            $n[$i] = random_int(0, 9);
        }

        $d1 = 0;
        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $d1 += $n[$i] * $j;
        }
        $d1 = 11 - ($d1 % 11);
        $d1 = ($d1 >= 10) ? 0 : $d1;

        $d2 = 0;
        for ($i = 0, $j = 11; $i < 9; $i++, $j--) {
            $d2 += $n[$i] * $j;
        }
        $d2 += $d1 * 2;
        $d2 = 11 - ($d2 % 11);
        $d2 = ($d2 >= 10) ? 0 : $d2;

        $cpf = implode('', $n).$d1.$d2;

        return $formatted
            ? vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split($cpf))
            : $cpf;
    }

    public function cnpj(bool $formatted = true): string
    {
        $n = [];
        for ($i = 0; $i < 8; $i++) {
            $n[$i] = random_int(0, 9);
        }

        $n[8] = $n[9] = 0;
        $n[10] = 0;
        $n[11] = 1;

        $d1 = 0;
        $d2 = 0;
        $m1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $m2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        for ($i = 0; $i < 12; $i++) {
            $d1 += $n[$i] * $m1[$i];
            $d2 += $n[$i] * $m2[$i];
        }

        $d1 = 11 - ($d1 % 11);
        $d1 = ($d1 >= 10) ? 0 : $d1;
        $d2 += $d1 * 2;
        $d2 = 11 - ($d2 % 11);
        $d2 = ($d2 >= 10) ? 0 : $d2;

        $cnpj = implode('', $n).$d1.$d2;

        return $formatted
            ? vsprintf('%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s', str_split($cnpj))
            : $cnpj;
    }
}