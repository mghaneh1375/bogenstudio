<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Video
 *
 * @property int $id
 * @property string $title_en
 * @property string $description_en
 * @property string $title_fa
 * @property string $description_fa
 * @property string $title_gr
 * @property string $description_gr
 * @property string $title_ar
 * @property string $description_ar
 * @property string $preview
 * @property string $file
 * @property integer $priority
 * @property boolean $visibility
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereId($value)
 * @mixin Eloquent
 */

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';

    protected $fillable = [
        'preview',
        'file',
        'priority',
        'visibility',
        'title_en',
        'description_en',
        'title_fa',
        'description_fa',
        'title_ar',
        'description_ar',
        'title_gr',
        'description_gr'
    ];

    protected $hidden = [
        'visibility'
    ];

    public function scopeVisible($query) {
        return $query->where('visibility', '=', true);
    }
}
