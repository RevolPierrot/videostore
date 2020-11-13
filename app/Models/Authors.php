<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Authors
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @method static Builder|authors newModelQuery()
 * @method static Builder|authors newQuery()
 * @method static Builder|authors query()
 * @method static Builder|authors whereFirstname($value)
 * @method static Builder|authors whereId($value)
 * @method static Builder|authors whereLastname($value)
 * @mixin Eloquent
 */
class Authors extends Model
{
    use HasFactory;
    public $timestamps = false;
    //mass-assignments - post-Werte auf einmal erfassen:
    protected $fillable = ['firstname', 'lastname'];

    public function movies() {
        return $this->hasMany(Movies::class, 'author_id', 'id');
    }
    //hasMany geht auch umgekehrt, via belongsTo (würde man z.B. den movies den jeweiligen Autor zuordnen)
}
