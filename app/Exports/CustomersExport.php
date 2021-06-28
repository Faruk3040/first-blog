<?php

namespace App\Exports;


use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Mobile Number',
            'Address',
            'Status',
        ];
    }

    public function map($customer): array
    {

        return [
            $customer->id,
            $customer->name,
            $customer->email,
            $customer->mobile_num,
            $customer->address,
            $customer->status==1?"Active":"Inactive",


        ];
    }

}