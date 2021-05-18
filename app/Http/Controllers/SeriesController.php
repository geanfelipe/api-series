<?php
namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SeriesController extends BaseController
{
    public function __construct() 
    {
        $this->classe = Serie::class;
    }
}
