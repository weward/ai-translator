<?php

namespace App\Http\Controllers;

use App\Services\TranslatorService;
use Illuminate\Http\Request;

class AIController extends Controller
{
    public function __construct(public TranslatorService $service) {}

    public function index(Request $request)
    {
        $res = $this->service->translate($request);

        return $res;
    }
        
}
