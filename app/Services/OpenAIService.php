<?php 

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $connection;
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }

    protected function translate($request)
    {   
        return $this->connection
            ->post($this->config['url'], [
                'prompt' => $request['input'],
                'max_tokens' => $request['max_tokens'] ?? $this->config['max_tokens'],
                'temperature' => $this->config['temperature'] ?? $this->config['temperature'],
            ])
            // like try/catch
            ->throw(function(Response $response, RequestException $e) {
                // Log Error here
                info($e->getMessage());
            })
            ->json();            
    }

    private function connect()
    {
        $this->connection = Http::withoutVerifying()
            ->withHeaders($this->config['headers']);
    }
}