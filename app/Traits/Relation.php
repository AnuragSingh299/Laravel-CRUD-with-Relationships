<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;

    trait Relation
    {
        protected static function bootUuids()
        {
            static::saved(function ($model) {
                    $model->attachRelations($model);
                    $model->detachRelations($model);
            });
        }

        public function attachRelations($model)
        {
            $moduleName = class_basename($model);
            $moduleData = config('relation.'.$moduleName);
            $requestArray = request()->all(); 
            $requestIdArray = array_slice($requestArray, -(count($moduleData)), count($moduleData), true); 
            $requestIdsCount = count($requestIdArray);
            while($requestIdsCount > 0)
            {
                $var = key(array_slice($requestArray, -($requestIdsCount), ($requestIdsCount), true ));
                $var2= rtrim($var, "_id");
                $pivot = rtrim(key(array_slice( request()->all($var), -1, 1, true )), "_id")."_".strtolower($moduleName);
                $pivotColumn1 = $var;
                $pivotColumn2 = strtolower($moduleName)."_id";
                $relationType = $moduleData[ucfirst($var2)]['relationshipname'];
                $relation = $relationType == "Many to Many" ? $var2.'s' : $var2;
                if(DB::table($pivot)
                    ->where($pivotColumn1, request()->all($var))
                    ->where($pivotColumn2, $model->getKey())
                    ->count() < 1)
                {
                    $obj = $model::find($model->getKey());
                    $obj->$relation()->attach(request()->all($var));   
                }
                $requestIdsCount--;   
            }
        }

        public function detachRelations($model)
        {
            $moduleName = class_basename($model);
            $moduleData = config('relation.'.$moduleName);
            $requestArray = request()->all(); 
            $requestIdArray = array_slice($requestArray, -(count($moduleData)), count($moduleData), true); 
            $requestIdsCount = count($requestIdArray);
            while($requestIdsCount > 0)
            {
                $var = key(array_slice($requestArray, -($requestIdsCount), ($requestIdsCount), true ));
                $var2= rtrim($var, "_id");
                $pivot = rtrim(key(array_slice( request()->all($var), -1, 1, true )), "_id")."_".strtolower($moduleName);
                $pivotColumn1 = $var;
                $pivotColumn2 = strtolower($moduleName)."_id";
                $relationType = $moduleData[ucfirst($var2)]['relationshipname'];
                $relation = $relationType == "Many to Many" ? $var2.'s' : $var2;
                if(DB::table($pivot)
                    ->where($pivotColumn1, request()->all($var))
                    ->where($pivotColumn2, $model->getKey())
                    ->count() == 1)
                {
                    $obj = $model::find($model->getKey());
                    $obj->$relation()->detach(request()->all($var));
                }
                $requestIdsCount--;
            }
        }
    }
?>