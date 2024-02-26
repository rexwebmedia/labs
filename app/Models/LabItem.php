<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabItem extends Model
{
    use HasFactory;
    use UuidTrait;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'price',
        'status',
        'team_id',
        'lab_item_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(LabItemCategory::class, 'lab_item_category_id');
    }
}
