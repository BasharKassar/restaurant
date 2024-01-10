<?php

namespace App\Imports;

use App\Models\Meal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MealsImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Meal::updateOrCreate([
            'name'=>$row[1]],[
            'category'=>$row[2],
            'description'=>$row[3],
            'price'=>$row[4],
            'image'=>$row[5],

        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
