<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    use HasFactory;

    public function scopeDuplicatedPostalCode($query, $flag)
    {
        if ($flag) {
            // Builder objectにチェーンしていくと、元のBuilderが
            // mutateされてしまう。そこでcloneしておいて、元のものを
            // そのままで残しておかないと、2回目のクエリがうまくいかない。
            $clonedQuery = $query->clone();
            $duplicatedPostalCodes = $clonedQuery->selectRaw('postal_code, count(*) as count')
                                            ->groupBy('postal_code')
                                            ->having('count', '>', 1)->pluck('postal_code');
            return $query->whereIn('postal_code', $duplicatedPostalCodes)->orderBy('postal_code', 'asc');
        } else {
            return $query;
        }
    }

    public function scopePrefecture($query, $prefecture)
    {
        return $query->where('prefecture', $prefecture);
    }
}
