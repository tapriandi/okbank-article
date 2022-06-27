<?php

return [
    'pages' => [
        '__home__' => [
            'title' => 'Home',
            'preprocessor' => \App\Preprocessor\HomepagePreprocessor::class,
        ],
        'article' => [
            'title' => 'Artikel',
            'preprocessor' => \App\Preprocessor\ArticlePreprocessor::class,
        ],
        'finansial' => [
            'title' => 'Finansial',
            'preprocessor' => \App\Preprocessor\FinancePreprocessor::class,
        ],
        'karir-&-sukses' => [
            'title' => 'Karir & Sukses',
            'preprocessor' => \App\Preprocessor\CareerPreprocessor::class,
        ],
        'gaya-hidup' => [
            'title' => 'Gaya Hidup',
            'preprocessor' => \App\Preprocessor\LifeStylePreprocessor::class,
        ],
    ],
    'blocks' => [
    ],
    'images' => [
    ],

];
