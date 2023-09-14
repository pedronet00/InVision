<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){

        $user = auth()->user();
        
        $projects = $user->projects()
        ->orderBy('Total', 'desc')
        ->take(3)
        ->get();

        return view('dashboard', compact('projects'));
    }

    public function projectList(){
        $user = auth()->user();
    
        // Obtém todos os times (equipes) aos quais o usuário pertence
        $teams = $user->allTeams();
    
        // Obtém os IDs das equipes às quais o usuário pertence
        $teamIds = $teams->pluck('id')->toArray();
    
        // Obtém todos os projetos associados às equipes do usuário
        $projects = Project::whereIn('team_id', $teamIds)->get();
    
        return view('projects.list', compact('projects'));
    }
    

    public function create(){

        // Obtém o usuário logado
        $user = Auth::user();

        // Obtém todos os times (equipes) associados ao usuário
        $teams = $user->allTeams();

        return view('projects.create', compact('teams'));
    }

    public function show($id){
        // Obtém o projeto pelo ID
        $project = Project::findOrFail($id);
        
        // Verifica se o usuário atual pertence à equipe associada ao projeto
        $user = auth()->user();
        $team = $project->team; // Obtém a equipe associada ao projeto
    
        if ($user->belongsToTeam($team)) {
            // Se o usuário pertencer à equipe, obtenha as tarefas do projeto
            $tasks = Task::where('project', $id)->orderBy('Total', 'desc')->get();
                
            return view ('projects.show', compact('project', 'tasks'));
        } else {
            // Se o usuário não pertencer à equipe, redirecione ou retorne uma mensagem de erro
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar este projeto.');
        }
    }

    public function projectEnded($projectId){

           $project = Project::find($projectId); 

           if($project){

                $project->status = 1;
                $project->save();

                return redirect()->back();
           } else{
            return redirect('/dashboard');
           }  
    }

    public function projectDeleted($projectId){

        $project = Project::find($projectId); 

        if($project){

             $project->status = 2;
             $project->save();

             return redirect()->back();
        } else{
         return redirect('/dashboard');
        }  
 }

    public function store(Request $request){

        $project = new Project;

        $project->projectName = $request->projectName;
        $project->projectDescription = $request->projectDescription;
        $project->G = $request->g;
        $project->U = $request->u;
        $project->T = $request->t;
        $project->Total = $request->g + $request->u + $request->t;
        $project->status = 0;
        $project->team_id = $request->teamId;
    
        $project->save();
    
        // Associar o usuário atual ao projeto e salvar na tabela project_user
        auth()->user()->projects()->attach($project->id);
    
        return redirect('/project/list');

    }
}
