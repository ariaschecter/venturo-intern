<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index (Request $request) {
        $tahun = $request->tahun;

        $transaksi = Http::get('http://tes-web.landa.id/intermediate/transaksi?tahun=' . $request->tahun);
        $transaksi = collect($transaksi->json());

        $menus = Http::get('https://tes-web.landa.id/intermediate/menu');
        $menus = $menus->json();

        $sum_months = [];
        $months = [];
        // Membuat data array bulan dari Jan - Dec
        for ($i = 0; $i <12; $i++) {
            $month[] = Carbon::parse('2022-' . $i + 1 . '-12')->format('M');
        }

        // Mengisi data menjadi 0
        foreach ($menus as $key => $menu) {
            foreach ($month as $mon) {
                $menus[$key]['trx'][$mon]['total'] = 0;
                $sum_months[$mon] = 0;
            }
        }

        // Mengisi data yang 0 dengan data yang ada, dan melakukan proses penjumlahan
        foreach ($transaksi as $key_trx => $trx) {
            foreach ($menus as $key => $menu) {
                if ($menu['menu'] == $trx['menu']) {
                    $date = Carbon::parse($trx['tanggal'])->format('M');
                    $menus[$key]['trx'][$date]['total'] += $trx['total'];
                    $sum_months[$date] += $trx['total'];
                }
            }
        }

        return view('index', compact('tahun', 'transaksi', 'menus', 'sum_months'));
    }

    public function menu() {
        $data = Http::get('https://tes-web.landa.id/intermediate/menu');
        return $data;
    }

    public function transaksi(Request $request) {
        $data = Http::get('http://tes-web.landa.id/intermediate/transaksi?tahun=' . $request->tahun);
        return $data;
    }
}
