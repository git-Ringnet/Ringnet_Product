<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class GenericExport implements FromCollection, WithHeadings
{
    protected $collection;
    protected $headings;

    public function __construct(Collection $collection, array $headings)
    {
        $this->collection = $collection;
        $this->headings = $headings;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->collection;
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
