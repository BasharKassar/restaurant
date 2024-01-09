<?php

namespace App\Imports;

use App\Models\Meal;
use Maatwebsite\Excel\Concerns\ToModel;

class MealssImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Meal::firstOrCreate([
            'name'=>$row[1]],[
            'image'=>$row[2],
            'price'=>$row[3],
            'description'=>$row[4],
            'category'=>$row[5]
        ]);
    }
}
