<?php

namespace App\Http\Controllers;

class SeriesController
{
    public function listarSeries ()
    {
        $series = [
            'Ponto cego',
            'Elite',
            'A grande família',
            'Eu, a patroa e as crianças'
        ];

        $html = '<ul>';

        foreach($series as $serie) {
            // Atenção as aspas duplas aqui?
            $html .= "<li>$serie</li>";
        }

        $html .= '</ul>';

        echo $html;
    }
}
