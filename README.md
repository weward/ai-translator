# AI Translator

This an AI-powered translation app. Currently supports `OpenAI`.

---
### Tech Stack

- Laravel 10
- AI Services Supported:
    - OpenAI
    - 

---
### Configure ENV Vars

- Config parameters for OpenAI

```
AI_CONNECTION=openai

OPEN_AI_SECRET_KEY=
OPEN_AI_MODEL=text-davinci-003
# OPEN_AI_MODEL=gpt-3.5-turbo

```

---

## Sample #1
```json
{
    "input": "I am Roland Edward",
    "input_language": "Filipino"
}
```

Result

```json
{
    "id": "cmpl-7LSt0hKqGKlIndCioOgiaE40ffAky",
    "object": "text_completion",
    "created": 1685350282,
    "model": "text-davinci-003",
    "choices": [
        {
            "text": "\n\nAko ay si Roland Edward.",
            "index": 0,
            "logprobs": null,
            "finish_reason": "stop"
        }
    ],
    "usage": {
        "prompt_tokens": 10,
        "completion_tokens": 9,
        "total_tokens": 19
    }
}
```

---
## Sample #2

```json
{
    "input": "I am Roland Edward",
    "input_language": "Filipino, French, Spanish"
}
```

Result:
```json
{
    "id": "cmpl-7LSrptiaciQf6Kv2btPoSkm1dnkdo",
    "object": "text_completion",
    "created": 1685350209,
    "model": "text-davinci-003",
    "choices": [
        {
            "text": "\n\nFilipino: Ako ay si Roland Edward\nFrench: Je suis Roland Edward\nSpanish: Soy Roland Edward",
            "index": 0,
            "logprobs": null,
            "finish_reason": "stop"
        }
    ],
    "usage": {
        "prompt_tokens": 14,
        "completion_tokens": 26,
        "total_tokens": 40
    }
}
```

---
### Flow
- Request goes through `routes/api.php` -> `->name('ask')`
- Request is passed into the `AIController`'s `index` method
- The `TranslatorService` gets injected
- The `TranslatorService` loads the current configured `ai` connection from the config file `config/ai.php`
- `OpenAI` is the default connection and it uses the OpenAIService as called in the `TranslatorService`'s  `loadService()` method


.
---
# Contributing

Email: dev.weward@gmail.com