<?php
/*
Display all values matching the keys 'name'
Display matching paths for all values

The result of this program is : 

***** Display all keys ******
|hello1|hello2|hello3|hello4|hello5|hello6|hello7|

***** Display all keys with their paths ******
Path for hello1 => 0|0
Path for hello2 => 0|1
Path for hello3 => 0|2|0|0
Path for hello4 => 0|2|0|1
Path for hello5 => 1|0|0
Path for hello6 => 1|0|1
Path for hello7 => 2

*/
$directory = [
     [
        [
            'name' => 'hello1' 
        ],
        [
            'name' => 'hello2' 
        ],
        [
            [
               [
                   'name' => 'hello3' 
               ],
               [
                   'name' => 'hello4' 
               ]
               
            ]
       ]    
     ],
     [
        [
           [
               'name' => 'hello5' 
           ],
           [
               'name' => 'hello6' 
           ],
           
        ]
    ],
    [
        'name' => 'hello7' 
    ]
];

$resultat        = [];
$resultatPathTmp = []; //Array that represents the current path in my recursivity
$resultatPath    = []; //Associative array with key = path and val = value of input array

function main($myArray, &$resultat, &$resultatPath, &$resultatPathTmp) {
    for ($i=0; $i < count($myArray); $i++) {
        if (!array_key_exists('name', $myArray)) {
            $val = $myArray[$i];
            $resultatPathTmp[] = $i;
            main($val, $resultat, $resultatPath, $resultatPathTmp);
            array_pop($resultatPathTmp);
            continue;
        }
        $resultat[]      = $myArray['name']; 
        $path            = implode('|', $resultatPathTmp);
        $resultatPath[$path] = $myArray['name'];        
    }
}

main($directory, $resultat, $resultatPath, $resultatPathTmp);

echo '***** Display all keys ******';
echo PHP_EOL;
echo '|';
for ($i=0; $i < count($resultat); $i++) { 
    echo  $resultat[$i] . '|';
}

echo PHP_EOL;
echo PHP_EOL;

echo '***** Display all keys with their paths ******';
echo PHP_EOL;

foreach ($resultatPath as $key => $val) { 
    echo  'Path for ' .$val . ' => ' .$key;
    echo PHP_EOL;
}







