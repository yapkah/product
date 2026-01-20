<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::with('category')->get()->map(function($p) {
            return [
                'ID' => $p->id,
                'Name' => $p->name,
                'Category' => $p->category->name,
                'Price' => $p->price,
                'Stock' => $p->stock,
                'Enabled' => $p->enabled ? 'Yes' : 'No',
                'Created At' => $p->created_at
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Category', 'Price', 'Stock', 'Enabled', 'Created At'];
    }
}
