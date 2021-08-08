<?php

namespace App\Exports;

use App\Models\Stage;
use Illuminate\View\View;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Auth;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class StageExport implements ShouldAutoSize, FromView, WithStyles
{
    public function view(): View
    {
        $enseignant = Enseignant::where('user_id','=',Auth::user()->id)->first();
        $stages = $enseignant->classes->stages;
        return view('exports.stages', [
            'stages' => $stages
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
