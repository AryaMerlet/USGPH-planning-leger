<?php

namespace App\Models\Planning;

use App\Traits\LogAction;
use App\Traits\WhoActs;
use Database\Factories\Planning\MaterielFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string $nom_materiel
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $user_id_creation
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id_modification
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $user_id_suppression
 * @property-read string $actions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, QuantiteMateriel> $quantiteMateriels
 * @property-read int|null $quantite_materiels_count
 * @property-read \App\Models\User $userCreation
 * @property-read \App\Models\User|null $userModification
 * @property-read \App\Models\User|null $userSuppression
 * @method static \Database\Factories\Planning\MaterielFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel whereNomMateriel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel whereUserIdCreation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel whereUserIdModification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel whereUserIdSuppression($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materiel withoutTrashed()
 * @mixin \Eloquent
 */
class Materiel extends Model
{
    /**
     * @use HasFactory<MaterielFactory>
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
    
    /** @return HasMany<QuantiteMateriel, $this> */
    public function quantiteMateriels(): HasMany
    {
        return $this->hasMany(QuantiteMateriel::class);
    }
}