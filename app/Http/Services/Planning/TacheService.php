<?php

namespace App\Http\Services\Planning;

use App\Http\Repositories\Planning\TacheRepository;
use App\Http\Repositories\Planning\QuantiteMaterielRepository;
use App\Models\Planning\Tache;
use App\Models\User;
use Illuminate\Support\Collection;

class TacheService
{
    /**
     * @var TacheRepository
     */
    protected $repository;

    /**
     * @var PlanningService
     */
    protected $planningService;

    /**
     * @var QuantiteMaterielRepository
     */
    protected $quantiteMaterielRepository;

    /**
     * Constructor
     *
     * @param  TacheRepository  $repository
     * @param  PlanningService  $planningService
     * @param  QuantiteMaterielRepository  $quantiteMaterielRepository
     */
    public function __construct(
        TacheRepository $repository, 
        PlanningService $planningService,
        QuantiteMaterielRepository $quantiteMaterielRepository
    ) {
        $this->repository = $repository;
        $this->planningService = $planningService;
        $this->quantiteMaterielRepository = $quantiteMaterielRepository;
    }

    /**
     * Store a new model instance
     *
     * @param  array<mixed>  $inputs
     *
     * @return Tache
     */
    public function store(array $inputs): Tache
    {
        $inputs = $this->planningService->convertDate($inputs);

        // $inputs = $this->planningService->handleOverlappingPlans($inputs);

       $tache = $this->repository->store($inputs);   
        if (isset($inputs['materiels']) && is_array($inputs['materiels'])) {
            foreach ($inputs['materiels'] as $materiel) {
                $materielData = [
                    'id_tache' => $tache->id,
                    'id_materiel' => $materiel['id_materiel'],
                    'quantite' => $materiel['quantite']
                ];
                $this->quantiteMaterielRepository->store($materielData);
            }
        }
        return $tache;
    }

    /**
     * Update the model instance
     *
     * @param  Tache  $tache
     * @param  array<mixed>  $inputs
     *
     * @return Tache
     */
    public function update(Tache $tache, array $inputs): Tache
    {
        $inputs = $this->planningService->convertDate($inputs);

        // $inputs = $this->planningService->handleOverlappingPlans($inputs, $planning);

        return $this->repository->update($tache, $inputs);
    }

    /**
     * Delete the model instance
     *
     * @param  Tache  $tache
     *
     * @return bool|null
     */
    public function destroy(Tache $tache)
    {
        //
        // Règles de gestion à appliquer avant l'enregistrement en base
        //

        return $this->repository->destroy($tache);
    }

    // /**
    //  * Undelete the model instance
    //  *
    //  * @param  Tache  $tache
    //  *
    //  * @return void
    //  */
    // public function undelete(Tache $tache)
    // {
    //     //
    //     // Règles de gestion à appliquer avant l'enregistrement en base
    //     //

    //     $this->repository->undelete($tache);
    // }

    // /**
    //  * Return a JSON for index datatable
    //  *
    //  * @return string|false|void — a JSON encoded string on success or FALSE on failure
    //  */
    // public function json()
    // {
    //     //
    //     // Règles de gestion à appliquer avant l'enregistrement en base
    //     //

    //     return $this->repository->json();
    // }

    /**
     * Get the tasks for a given user for the week
     *
     * @param  User  $user
     *
     * @return \Illuminate\Support\Collection<int, array<string, mixed>>
     */
    public function getTachesPerWeek(User $user): Collection
    {
        return collect($this->repository->getTachesByUser($user));
    }
}
