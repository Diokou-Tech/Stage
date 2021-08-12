<?php

namespace App\Exports;

use Illuminate\View\View;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class StageVoeuExport  implements ShouldAutoSize, FromView, WithStyles
{
    public function view(): View
    {
        $enseignant = Enseignant::where('user_id','=',Auth::user()->id)->first();
        $enseignants = Enseignant::all();
        foreach($enseignants as $ens){
            $tabEns[$ens->id] = "$ens->nom $ens->prenom $ens->matricule";
        }
        $stages = $enseignant->classes->stages;
        return view('exports.voeux', [
            'stages' => $stages,
            'tabEns' =>  $tabEns
        ]);
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true],['size' => 20]],

            // // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}
