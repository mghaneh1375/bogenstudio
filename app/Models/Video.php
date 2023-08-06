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
 * @property string $link
 * @property integer $priority
 * @property boolean $visibility
 * @property boolean $file_status
 * @property boolean $start_uploading
 * @method static Builder|Video newModelQuery()
 * @method static Builder|Video newQuery()
 * @method static Builder|Video query()
 * @method static Builder|Video whereId($value)
 * @mixin Eloquent
 */

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';

    protected $fillable = [
        'preview',
        'file',
        'link',
        'priority',
        'visibility',
        'title_en',
        'description_en',
        'title_fa',
        'description_fa',
        'title_ar',
        'description_ar',
        'title_gr',
        'description_gr',
        'file_status',
        'start_uploading'
    ];

    protected $hidden = [
        'visibility'
    ];

    public function scopeVisible($query) {
        return $query->where('visibility', '=', true);
    }
}
