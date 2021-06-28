<?php

namespace App\Exports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
Use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return product::get();
    }
    public function headings(): array
    {
        return [
            'Id',
            'User',
            'Category',
            'Name',
            'Description',
            'Unit Price',
            'Height',
            'Width',
            'Weight',
            'Size',
            'Status'
        ];
    }
    public function map($product): array
    {

        return [
            $product->id,
            $product->user=>auth()->user()->name,
            $product->category->name,
            $product->name,
            $product->description,
            $product->unit_price,
            $product->height,
            $product->width,
            $product->weight,
            $product->size,
            $product->status==1?"Active":"Inactive",


        ];
    }
}
