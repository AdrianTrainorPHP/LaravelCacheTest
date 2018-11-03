<?php

namespace App\Models\Company;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models\Company
 */
class Report extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'company_reports';

    /**
     * @var array
     */
    protected $fillable = [
        'bool_1',
        'bool_2',
        'bool_3',
        'bool_4',
        'bool_5',
        'bool_6',
        'bool_7',
        'bool_8',
        'bool_9',
        'bool_10',
        'string_1',
        'string_2',
        'string_3',
        'string_4',
        'string_5',
        'string_6',
        'string_7',
        'string_8',
        'string_9',
        'string_10',
        'float_1',
        'float_2',
        'float_3',
        'float_4',
        'float_5',
        'float_6',
        'float_7',
        'float_8',
        'float_9',
        'float_10',
        'timestamp_1',
        'timestamp_2',
        'timestamp_3',
        'timestamp_4',
        'timestamp_5',
        'timestamp_6',
        'timestamp_7',
        'timestamp_8',
        'timestamp_9',
        'timestamp_10',
        'integer_1',
        'integer_2',
        'integer_3',
        'integer_4',
        'integer_5',
        'integer_6',
        'integer_7',
        'integer_8',
        'integer_9',
        'integer_10',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
