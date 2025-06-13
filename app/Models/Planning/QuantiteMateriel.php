<?php

namespace App\Models\Planning;

use App\Models\User;
use App\Traits\LogAction;
use App\Traits\WhoActs;
use Database\Factories\Planning\QuantiteMaterielFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property int $quantite
 * @property int $tache_id
 * @property int $materiel_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $user_id_creation
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id_modification
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $user_id_suppression
 * @property-read string $actions
 * @property-read Materiel $materiel
 * @property-read Tache $tache
 * @property-read User $userCreation
 * @property-read User|null $userModification
 * @property-read User|null $userSuppression
 * @method static \Database\Factories\Planning\QuantiteMaterielFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereMaterielId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereQuantite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereTacheId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereUserIdCreation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereUserIdModification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel whereUserIdSuppression($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuantiteMateriel withoutTrashed()
 * @mixin \Eloquent
 */
class QuantiteMateriel extends Model
{
    /**
     * @use HasFactory<QuantiteMaterielFactory>
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
        'quantite',
        'tache_id',
        'materiel_id',
        'user_id_creation',
    ];

    /** @return string */
    public function getActionsAttribute(): string
    {
        return '';
    }
    
    /** @return BelongsTo<Tache, $this> */
    public function tache(): BelongsTo
    {
        return $this->belongsTo(Tache::class);
    }

    /** @return BelongsTo<Materiel, $this> */
    public function materiel(): BelongsTo
    {
        return $this->belongsTo(Materiel::class);
    }
}