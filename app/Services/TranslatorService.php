<?php 

namespace App\Services;

class TranslatorService 
{
    protected $config;
    protected $service;
    protected $request;

    public function __construct()
    {
        $this->config = $this->loadService();
    }

    public function translate($request)
    {
        return $this->service->translate($request);
    }

    public function loadService()
    {
        $connection = config('ai.connection');
        $service = config("ai.{$connection}");
        $this->service = new $service['service_class']($service);
    }
    
}