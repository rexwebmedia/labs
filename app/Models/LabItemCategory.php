<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabItemCategory extends Model
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
        'status',
        'team_id',
    ];

    public function labItems()
    {
        return $this->hasMany(LabItem::class, 'lab_item_category_id', 'id');
    }
}
