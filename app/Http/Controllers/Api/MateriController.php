<?php

namespace App\Http\Controllers\Api;

use App\Materi;
use Illuminate\Routing\Controller;

class MateriController extends Controller
{
    public function fetchMateri()
    {
        $materi = Materi::paginate(5);
        return $materi;
    }
}
