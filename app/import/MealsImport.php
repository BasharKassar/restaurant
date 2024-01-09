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
            'image'=>$row[2],
            'price'=>$row[3],
            'description'=>$row[4],
            'category'=>$row[5]
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
