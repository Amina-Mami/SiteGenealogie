<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Person extends Model
{

    protected $table = 'people';
   

   
    public function parents()
    {
        return $this->belongsToMany(
            Person::class, 
            'relationships', 
            'child_id', 
            'parent_id' 
        );
    }

    
    public function children()
    {
        return $this->belongsToMany(
            Person::class, 
            'relationships', 
            'parent_id', 
            'child_id' 
        );
    }

    public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}


    public function getDegreeWith($target_person_id)
    {
       
        $start_id = $this->id;
        $visited = [$start_id => true];
        $queue = [[$start_id, 0]]; 
        $max_degree = 25;

        while (!empty($queue)) {
            [$current_id, $current_degree] = array_shift($queue);

           
            if ($current_degree > $max_degree) {
                return false;
            }

           
            if ($current_id == $target_person_id) {
                return $current_degree;
            }

            
            $neighbors = DB::select("
                SELECT DISTINCT person_id
                FROM (
                    SELECT parent_id AS person_id FROM relationships WHERE child_id = ?
                    UNION
                    SELECT child_id AS person_id FROM relationships WHERE parent_id = ?
                ) neighbors
            ", [$current_id, $current_id]);

            foreach ($neighbors as $neighbor) {
                $neighbor_id = $neighbor->person_id;

                
                if (!isset($visited[$neighbor_id])) {
                    $visited[$neighbor_id] = true;
                    $queue[] = [$neighbor_id, $current_degree + 1];
                }
            }
        }

        
        return false;
    }
}
