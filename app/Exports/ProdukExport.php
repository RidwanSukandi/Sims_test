<?php

namespace App\Exports;

use App\Http\Controllers\ProductController;
use App\Models\Produk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProdukExport implements FromQuery
{
    use Exportable;

    public $query;

    public function __construct(string $query)
    {
        $this->query = $query;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Produk::query();

        if ($this->query == "Olahraga" || $this->query == "Musik") {
            $query->where('kategori', 'ilike', '%' . $this->query . '%');
        }

        return $query;
    }
}
