<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\movies
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $price
 * @property string $string
 * @method static Builder|movies newModelQuery()
 * @method static Builder|movies newQuery()
 * @method static Builder|movies query()
 * @method static Builder|movies whereAuthorId($value)
 * @method static Builder|movies whereId($value)
 * @method static Builder|movies wherePrice($value)
 * @method static Builder|movies whereString($value)
 * @method static Builder|movies whereTitle($value)
 * @mixin Eloquent
 */
class Movies extends Model
{
    use HasFactory;
}
