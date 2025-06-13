<?php

namespace App\Models\Planning;

use App\Models\User;
use App\Models\Planning\Materiel;
use App\Models\Planning\Tache;
use App\Traits\LogAction;
use App\Traits\WhoActs;
use Database\Factories\Planning\TacheFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string $nom
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $user_id_creation
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id_modification
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $user_id_suppression
 * @property int $categorie_id
 * @property-read \App\Models\Planning\Categorie $categorie
 * @property-read string $actions
 * @property-read User|null $user
 * @property-read User $userCreation
 * @property-read User|null $userModification
 * @property-read User|null $userSuppression
 * @method static \Database\Factories\Planning\TacheFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache whereUserIdCreation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache whereUserIdModification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache whereUserIdSuppression($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tache withoutTrashed()
 * @mixin \Eloquent
 */
class Tache extends Model
{
    /**
     * @use HasFactory<TacheFactory>
     */
    use HasFactory;

    use LogAction;
    use SoftDeletes;
    use WhoActs;

    /**
     * @var list<string>
     */
    protected $appends = [
        'actions',
    ];

    protected $fillable = [
        'nom_materiel',
        'user_id_creation',
    ];

    /** @return string */
    public function getActionsAttribute(): string
    {
        return '';
    }
    
    /** @return HasMany<Materiel, $this> */
    public function materiels(): HasMany
    {
        return $this->belongsTo(Materiel::class);
    }

    /** @return HasMany<Tache, $this> */
    public function taches(): HasMany
    {
        return $this->belongsTo(Tache::class);
    }
}
