<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Folder
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Folder newModelQuery()
 * @method static Builder|Folder newQuery()
 * @method static Builder|Folder query()
 * @method static Builder|Folder whereCreatedAt($value)
 * @method static Builder|Folder whereId($value)
 * @method static Builder|Folder whereName($value)
 * @method static Builder|Folder whereUpdatedAt($value)
 * @method static Builder|Folder whereUserId($value)
 * @mixin Eloquent
 * @property-read \App\Models\User $user
 */
class Folder extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
