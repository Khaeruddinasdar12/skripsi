<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\TransaksiBarang;
use App\TransaksiGabah;
use App\TransaksiSawah;
use DB;

class ExcelExport implements FromCollection
{
	public $convert;
	public function __construct($data)
    {
    	$this->convert = $data; 
    }


    public function collection()
    {
        return $this->convert;
    }
}
