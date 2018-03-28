<?php

namespace App\Http\Controllers;

use Input;
use App\Item;
use DB;
use Excel;

class ExportsController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }
    
    public function downloadExcel($type)
    {
        $data = Item::get()->toArray();
        
        return Excel::create(
            'file',
            function ($excel) use ($data) {
                $excel->sheet(
                    'mySheet',
                    function ($sheet) use ($data) {
                        $sheet->fromArray($data);
                    }
                );
            }
        )->download($type);
    }
    
    public function importExcel()
    {
        //dd(request()->all());
        if (request('import_file')) {
            $path = request()->file('import_file')->getRealPath();
            $data = Excel::load(
                $path,
                function ($reader) {
                }
            )->get();
//            if (!empty($data) && $data->count()) {
//                foreach ($data as $key => $value) {
//                    $insert[] = ['title' => $value->title, 'description' => $value->description];
//                }
//                if (!empty($insert)) {
//                    DB::table('items')->insert($insert);
//                    dd('1Insert Record successfully.');
//                }
//            }
//
//            dd('2Insert Record successfully.');
    
            return Excel::create(
                'file',
                function ($excel) use ($data) {
                    $excel->sheet(
                        'mySheet',
                        function ($sheet) use ($data) {
                            $sheet->fromArray($data);
                        }
                    );
                }
            )->download(request('type') ?? 'xlsx');
        }
        
        return back();
    }
}

