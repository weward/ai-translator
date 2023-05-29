<?php

namespace App\Http\Controllers;

use App\Services\TranslatorService;
use Illuminate\Http\Request;

class AIController extends Controller
{
    public function __construct(protected TranslatorService $service) {}

    public function index(Request $request)
    {
        return $this->service->translate($request);
    }
        
}
