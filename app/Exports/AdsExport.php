<?php

namespace App\Exports;

use App\Models\Ad;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdsExport implements FromView
{
    public function view(): View
    {
        return view('admin.ads.ads_table', [
            'ad' => Ad::where('payment_status', 1)->get()
        ]);
    }
}
