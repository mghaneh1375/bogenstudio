<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $mail
 * @property string $phone
 * @property string $ip
 * @property boolean $seen
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact query()
 * @method static Builder|Contact whereId($value)
 * @method static Builder|Contact whereIp($value)
 * @method static Builder|Contact whereSeen($value)
 * @mixin Eloquent
 */
class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';

    protected $fillable = [
        'name',
        'mail',
        'phone',
        'ip'
    ];

}
