<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoriesExport implements FromCollection,  WithMapping, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::get();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'User',
            'Alias',
            'Status'
        ];
    }
    public function map($category): array
    {

        return [
            $category->id,
            $category->name,
            $category->user=>auth()->user()->name,
            $category->alias,
            $category->status==1?"Active":"Inactive",


        ];
    }
}
