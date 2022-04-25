<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Model3D
 *
 * @property int $id
 * @property string $model
 * @property string|null $texture
 * @property integer $priority
 * @property boolean $visibility
 * @method static Builder|Model3D newModelQuery()
 * @method static Builder|Model3D newQuery()
 * @method static Builder|Model3D query()
 * @method static Builder|Model3D whereId($value)
 * @mixin Eloquent
 */

class Model3D extends Model
{
    use HasFactory;
    protected $table = 'models';

    protected $fillable = [
        'model',
        'texture',
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
