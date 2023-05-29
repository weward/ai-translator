<?php 

namespace App\Services;

class TranslatorService 
{
    protected $config;
    protected $service;
    protected $request;

    public function __construct($request)
    {
        $this->config = $this->loadService();
        $this->request = $request;
    }

    public function translate()
    {
        return $this->service->translate($this->request);
    }
    public function loadService()
    {
        $config = config('ai.connection');
        $this->service = new $config['service_class']($config);
    }
}