<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Solution
 *
 * @property int $id
 * @property string|null $tags_en
 * @property string|null $sub_tags_en
 * @property string|null $title_en
 * @property string|null $description_en
 * @property string|null $digest_en
 * @property string|null $tags_fa
 * @property string|null $sub_tags_fa
 * @property string|null $title_fa
 * @property string|null $description_fa
 * @property string|null $digest_fa
 * @property string|null $sub_tags_ar
 * @property string|null $tags_ar
 * @property string|null $title_ar
 * @property string|null $description_ar
 * @property string|null $digest_ar
 * @property string|null $tags_gr
 * @property string|null $sub_tags_gr
 * @property string|null $title_gr
 * @property string|null $description_gr
 * @property string|null $digest_gr
 * @property string $default_lang
 * @property string $pic
 * @property integer $priority
 * @property boolean $visibility
 * @method static Builder|Solution newModelQuery()
 * @method static Builder|Solution newQuery()
 * @method static Builder|Solution query()
 * @method static Builder|Solution whereId($value)
 * @mixin Eloquent
 */

class Solution extends Model
{
    use HasFactory;
    protected $table = 'solutions';


    protected $fillable = [
        'tags_en',
        'sub_tags_en',
        'title_en',
        'description_en',
        'digest_en',
        'tags_fa',
        'sub_tags_fa',
        'title_fa',
        'description_fa',
        'digest_fa',
        'tags_ar',
        'sub_tags_ar',
        'title_ar',
        'description_ar',
        'digest_ar',
        'tags_gr',
        'sub_tags_gr',
        'title_gr',
        'description_gr',
        'digest_gr',
        'pic',
        'default_lang',
        'priority',
        'visibility'
    ];

    protected $hidden = [
        'visibility'
    ];

    public function scopeVisible($query) {
        return $query->where('visibility', '=', true);
    }
}
