<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CategoryExport implements FromCollection, WithHeadings
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => $this->data
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

}
