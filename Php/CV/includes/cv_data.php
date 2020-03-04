<?php

$informations = [
    'prenom' => 'Pierre',
    'nom' => 'Da Silva',
    'coordonnees' => '12630',
    'ville' => 'Agen d\'Aveyron'
];

$scolarite = [
    [
        'annee' => '2019',
        'diplome' => 'Licence Professionnelle',
        'lieu' => 'Champollion'
    ],
    [
        'annee' => '2018',
        'diplome' => 'BTS',
        'lieu' => 'Monteil'
    ],
    [
        'annee' => '2016',
        'diplome' => 'Bac STI2D',
        'lieu' => 'Monteil'
    ],
    [
        'annee' => '2013',
        'diplome' => 'Brevet des collèges',
        'lieu' => 'Jean Moulin'
    ]
    ];

$exp = array (
    [
        'annee' => '2019',
        'entreprise' => 'Brigade des Sapeurs Pompiers de Paris',
        'poste' => 'Pompier'
    ],
    [
        'annee' => '2019',
        'entreprise' => 'French Col',
        'poste' => 'Trésorier adjoint'
    ],
    [
        'annee' => '2018',
        'entreprise' => 'Belet Isolations',
        'poste' => 'Poseur d\'isolation'
    ],
    [
        'annee' => '2018',
        'entreprise' => 'Protection civile',
        'poste' => 'Secouriste'
    ],
    [
        'annee' => '2017',
        'entreprise' => 'Brico Depot',
        'poste' => 'Vendeur'
    ],
    [
        'annee' => '2017',
        'entreprise' => 'Bosch',
        'poste' => 'Dessinateur 3D'
    ],
    [
        'annee' => '2016',
        'entreprise' => 'Leclerc',
        'poste' => 'Vendeur et mise en rayon'
    ],
    [
        'annee' => '2015',
        'entreprise' => 'LDS crèche',
        'poste' => 'Montage de mobilier et matériel informatique'
    ],
    [
        'annee' => '2014',
        'entreprise' => 'Gaec ferme d Agen',
        'poste' => 'Maraicher'
    ],
    [
        'annee' => '2013',
        'entreprise' => 'Poujouly',
        'poste' => 'Garagiste'
    ]
);

$loisirs = ['Airsoft', 'Course a pied', 'Musculation'];

    //presentation
function pres() {
    foreach($GLOBALS['informations'] as $element)
    {
        echo ' ' . $element;
    }    
}

//scolaire
function scol() {
foreach($GLOBALS['scolarite'] as $element) {
    echo '<br>' . '<hr>' . '<br>';
    foreach($element as $element1) {
        echo $element1 . '<br>';
    }
}
}

//experiences pro
function exper() {
    foreach($GLOBALS['exp'] as $element) {
        echo '<br>' . '<hr>';
        foreach($element as $element1) {
            echo $element1 . '<br>';
        }
    }
}

//loisirs
function lois() {
for($i = 0; $i < 3; $i++) {
    echo $GLOBALS['loisirs'][$i] . '<br><hr><br>';
}
}


$pageTitles = ['presentation' => 'présentation', 'exppro' => 'Expériences professionnelles', 'scolaire' => 'scolaire', 'loisirs' => 'loisirs'];
?>
<style>
    body {
        color : black;
        margin-left : 30px;
    }
    h1 {
        color : red;
        font-weight : bold;
        margin-left : 100px;
        text-decoration : underline;
    }
</style>