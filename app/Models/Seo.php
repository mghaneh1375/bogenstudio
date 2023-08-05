<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Seo
 *
 * @property int $id
 * @property string $page
 * @property string|null $keyword_en
 * @property string|null $article_tag_en
 * @property string|null $description_en
 * @property string|null $keyword_ar
 * @property string|null $article_tag_ar
 * @property string|null $description_ar
 * @property string|null $keyword_fa
 * @property string|null $article_tag_fa
 * @property string|null $description_fa
 * @property string|null $keyword_gr
 * @property string|null $article_tag_gr
 * @property string|null $description_gr
 * @property integer|null $additional_id
 * @property string $default_lang
 * @method static Builder|Seo newModelQuery()
 * @method static Builder|Seo newQuery()
 * @method static Builder|Seo query()
 * @method static Builder|Seo whereId($value)
 * @method static Builder|Seo wherePage($value)
 * @method static Builder|Seo whereAdditionalId($value)
 * @mixin Eloquent
 */

class Seo extends Model
{
    use HasFactory;
    protected $table = 'seo';
    
    protected $fillable = [
        'keyword_en',
        'article_tag_en',
        'description_en',
        'keyword_fa',
        'article_tag_fa',
        'description_fa',
        'keyword_ar',
        'article_tag_ar',
        'description_ar',
        'keyword_gr',
        'article_tag_gr',
        'description_gr',
        'page',
        'default_lang',
    ];

}
