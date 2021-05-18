<?php
namespace App\Http\Controllers;

use App\Models\Episodio;

class EpisodiosController extends BaseController
{
    public function __construct() 
    {
        $this->classe = Episodio::class;
    }

    public function buscarPorSerie(int $serieId)
    {
        return Episodio::query()
        ->where('serie_id',$serieId)
        ->get();
    }
}
