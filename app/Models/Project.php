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
    public function deleteProject($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->delete();
            return response()->json(['success' => true, 'message' => 'Xóa thành công dự án']);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy dự án'], 404);
        }
        return $project;
    }
}
