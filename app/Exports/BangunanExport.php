<?php

namespace App\Exports;

use App\Building;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BangunanExport implements FromView
{
    public function view(): View
    {
        return view('exports.buildingtable', [
            'buildings' => Building::all()
        ]);
    }
}
