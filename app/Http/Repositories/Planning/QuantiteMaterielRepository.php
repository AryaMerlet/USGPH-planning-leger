<?php

namespace App\Http\Repositories\Planning;

use App\Models\Planning\QuantiteMateriel;
use Auth;

class QuantiteMaterielRepository
{
    /**
     * @var Quantitemateriel
     */
    protected $quantiteMateriel;

    /**
     * Constructor
     *
     * @param  QuantiteMateriel  $quantiteMateriel
     */
    public function __construct(QuantiteMateriel $quantiteMateriel)
    {
        $this->quantiteMateriel = $quantiteMateriel;
    }

    /**
     * Store a new model instance
     *
     * @param  array<mixed>  $inputs
     *
     * @return QuantiteMateriel
     */
    public function store(array $inputs): QuantiteMateriel
    {
        $quantiteMateriel = new $this->quantiteMateriel();
        $quantiteMateriel->user_id_creation = (int) Auth::id();
        
        $this->save($quantiteMateriel, $inputs);
        
        return $quantiteMateriel;
    }

    /**
     * Update the model instance
     *
     * @param  QuantiteMateriel  $cuantiteMateriel
     * @param  array<mixed>  $inputs
     *
     * @return QuantiteMateriel
     */
    public function update(QuantiteMateriel $quantiteMateriel, array $inputs): QuantiteMateriel
    {
        $quantiteMateriel->user_id_modification = (int) Auth::id();
        
        $this->save($quantiteMateriel, $inputs);
        
        return $quantiteMateriel;
    }

    // /**
    //  * Delete the model instance
    //  *
    //  * @param  CuantiteMateriel  $cuantiteMateriel
    //  *
    //  * @return bool|null
    //  */
    // public function destroy(CuantiteMateriel $cuantiteMateriel)
    // {
    //     $cuantiteMateriel->user_id_suppression = (int) Auth::id();
    //     $cuantiteMateriel->save();

    //     return $cuantiteMateriel->delete();
    // }

    // /**
    //  * Undelete the model instance
    //  *
    //  * @param  CuantiteMateriel  $cuantiteMateriel
    //  *
    //  * @return void
    //  */
    // public function undelete(CuantiteMateriel $cuantiteMateriel)
    // {
    //     $cuantiteMateriel->restore();
    // }

    // /**
    //  * Return a JSON for index datatable
    //  *
    //  * @return string|false|void — a JSON encoded string on success or FALSE on failure
    //  */
    // public function json()
    // {
    //     return json_encode(
    //         CuantiteMateriel::all()
    //     );
    // }

    /**
     * Save the model instance
     *
     * @param  QuantiteMateriel  $cuantiteMateriel
     * @param  array<mixed>  $inputs
     *
     * @return QuantiteMateriel
     */
    private function save(QuantiteMateriel $quantiteMateriel, array $inputs): QuantiteMateriel
    {
        $quantiteMateriel->id_tache = $inputs['id_tache'];
        $quantiteMateriel->id_materiel = $inputs['id_materiel'];
        $quantiteMateriel->quantite = $inputs['quantite'];
        $quantiteMateriel->save();

        return $quantiteMateriel;
    }
}
