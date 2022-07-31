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
        if ($prefecture) {
            return $query->where('prefecture', $prefecture);
        } else {
            return $query;
        }
    }

    public function scopePartialPostalCode($query, $postalCode)
    {
        $normalizedPostalCode = PostalCode::normalizePostalCode($postalCode);
        if ($normalizedPostalCode && strlen($normalizedPostalCode) > 0) {
            return $query->where('postal_code', 'like', "{$normalizedPostalCode}%");
        } else {
            # force return 0 results when $postalCode is blank.
            return $query->where('postal_code', 9999999);
        }
    }

    public function formattedPostalCode()
    {
        $postalCode = $this->postal_code;

        if (strpos($postalCode, '-') === false) {
            return substr($postalCode, 0, 3) . '-' . substr($postalCode, 3, 4);
        } else {
            return $postalCode;
        }
    }

    private static function normalizePostalCode($postalCode)
    {
        if (!$postalCode) { return $postalCode; };

        $postalCode = mb_convert_kana($postalCode, 'a');
        return preg_replace('/\D/', '', $postalCode);
    }
}
