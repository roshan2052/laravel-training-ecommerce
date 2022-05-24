<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class CategoryViewExport implements FromView,ShouldAutoSize,WithStyles,WithEvents
{
    protected $data,$countRow;

    public function __construct($data)
    {
        $this->data = $data;
        $this->countRow = $data['row']->count();
    }

    public function view(): View
    {
        return view('backend.category.export', [
            'categories' =>  $this->data['row']
        ]);
    }
    public function headings(): array
    {
        return [
            "name", "headings", "here", "name", "headings", "here",
            "name", "headings", "here", "name", "headings", "here",
            "headings", "here",
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRangeHead = 'A1:D1';
                $cellRangeBorder = 'A1:D'. $this->countRow+1;

                $event->sheet->getDelegate()->getStyle('A1:D11')->getFont()->setSize(12);

                $event->sheet->getDelegate()->getStyle($cellRangeBorder)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);

                $event->sheet->getDelegate()->getStyle($cellRangeHead)->applyFromArray(
                    [
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['rgb' => 'f1f5f7'],

                        ],
                    ]
                );

            },
        ];
    }

}
