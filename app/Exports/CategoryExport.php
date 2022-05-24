<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
        
    }
    public function collection()
    {
        return $this->data['row'];
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
