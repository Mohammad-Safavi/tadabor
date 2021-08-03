<?php

return [
    'characters' => ['0','1','2', '3', '4', '6', '7', '8', '9'],
    'default' => [
        'length' => 6,
        'width' => 200,
        'height' => 90,
        'quality' => 100,
        'math' => false,
        'expire' => 90,
        'encrypt' => false,
    ],
    'math' => [
        'length' => 9,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => true,
    ],

    'flat' => [
        'length' => 6,
        'width' => 130,
        'height' => 46,
        'quality' => 100,
        'lines' => 6,
        'bgImage' => false,
        'bgColor' => '#a0a4a5', 
        'fontColors' => ['#2c3e50', '#c0392b', '#806a00', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast' => 1,
    ],
    'mini' => [
        'length' => 3,
        'width' => 60,
        'height' => 32,
    ],
    'inverse' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'sensitive' => true,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 2,
        'invert' => true,
        'contrast' => -5,
    ]
];
