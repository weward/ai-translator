<?php 

return [
    'connection' => env('AI_CONNECTION', 'openai'),

    # OPEN AI
    'openai' => [
        'service_class' => 'App\\Services\\OpenAIService',
        'headers' => [
            'Authorization' => 'Bearer ' . env('OPEN_AI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ],
        'url' => 'https://api.openai.com/v1/engines/text-davinci-003/completions',
        'max_tokens' => 1000,
        'temperature' => 0.2,
    ],

    // some other ai provider

];

