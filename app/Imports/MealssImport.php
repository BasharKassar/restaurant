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
            'category'=>$row[2],
            'description'=>$row[3],
            'price'=>$row[4],
            'image'=>$row[5],

        ]);
    }
}
