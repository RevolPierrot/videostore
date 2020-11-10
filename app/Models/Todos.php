<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Todos
 *
 * @property int $id
 * @property int $done
 * @property string $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Todos newModelQuery()
 * @method static Builder|Todos newQuery()
 * @method static Builder|Todos query()
 * @method static Builder|Todos whereCreatedAt($value)
 * @method static Builder|Todos whereDone($value)
 * @method static Builder|Todos whereId($value)
 * @method static Builder|Todos whereText($value)
 * @method static Builder|Todos whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Todos extends Model
{
    use HasFactory;
    //siehe Laravel Dokumentation, ORM Eloquent Accessors/Mutations
    //neues Attribut hinzugefügt (anstelle der Yes/No Konfiguration in index.blade.php)
    //auto-ändert Werte; z.B. wenn man alle Namen mit Großbuchst. ausgeben möchte (return ucfirst($value))
    protected $appends = ['erledigt'];
    protected $fillable = ['done', 'text'];
    public function getErledigtAttribute() {
        if ($this->done) {
            return 'Yes';
        } else {
            return 'No';
        }
    }


}
