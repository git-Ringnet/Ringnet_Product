<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $fillable = [
        'project_name',
    ];
    public function getAllProject()
    {
        $project = Project::where('workspace_id', Auth::user()->current_workspace)->get();
        return $project;
    }
}
