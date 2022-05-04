<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string|null $tags_en
 * @property string|null $title_en
 * @property string|null $description_en
 * @property string|null $digest_en
 * @property string|null $tags_fa
 * @property string|null $title_fa
 * @property string|null $description_fa
 * @property string|null $digest_fa
 * @property string|null $tags_ar
 * @property string|null $title_ar
 * @property string|null $description_ar
 * @property string|null $digest_ar
 * @property string|null $tags_gr
 * @property string|null $title_gr
 * @property string|null $description_gr
 * @property string|null $digest_gr
 * @property string $default_lang
 * @property string $pic
 * @property integer $priority
 * @property boolean $visibility
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereId($value)
 * @mixin Eloquent
 */

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'tags_en',
        'title_en',
        'description_en',
        'digest_en',
        'tags_fa',
        'title_fa',
        'description_fa',
        'digest_fa',
        'tags_ar',
        'title_ar',
        'description_ar',
        'digest_ar',
        'tags_fr',
        'title_fr',
        'description_fr',
        'digest_fr',
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
