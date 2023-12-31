<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    
        // Inicializa um array para armazenar os dados do projeto
        $projectData = [];

        
    
        foreach ($projects as $project) {
            $totalTasks = $project->tasks->count();
            $completedTasks = $project->tasks->where('status', 1)->count(); 
    
            // Calcula o percentual de tarefas concluídas
            if ($totalTasks == 0) {
                $taskDonePercent = 0;
            } else {
                $taskDonePercent = ($completedTasks / $totalTasks) * 100;
            }

            // $projectUsers = $projects->users;
    
            // Armazena os dados do projeto no array $projectData
            $projectData[] = [
                'project' => $project,
                'totalTasks' => $totalTasks,
                'completedTasks' => $completedTasks,
                'taskDonePercent' => $taskDonePercent,
                // 'projectUsers' => $projectUsers,
            ];
        }
    
        return view('projects.list', compact('projectData'));
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

        $validatedData = $request->validate([
            'projectName' => 'required|string|max:255',
            'projectDescription' => 'required|string',
            'g' => 'required|numeric',
            'u' => 'required|numeric',
            't' => 'required|numeric',
        ]);

        $project = new Project;

        $user = Auth::user();
        
        // Obter o time atual do usuário
        $currentTeam = $user->currentTeam;

        // Agora você pode acessar as informações do time atual, por exemplo, o nome:
        $teamName = $currentTeam->name;

        $project->projectName = $request->projectName;
        $project->projectDescription = $request->projectDescription;
        $project->G = $request->g;
        $project->U = $request->u;
        $project->T = $request->t;
        $project->Total = $request->g + $request->u + $request->t;
        $project->status = 0;
        $project->team_id = $currentTeam->id;
        $project->teamName = $teamName;
    
        $project->save();
    
        // Associar o usuário atual ao projeto e salvar na tabela project_user
        auth()->user()->projects()->attach($project->id);
    
        return redirect('/project/list');

    }

    public function report() {

        $user = auth()->user();
    
        $projects = $user->projects()->get();

        $totalProjects = $projects->count();
    
        $finishedProjects = $user->projects()->where('status', 1)->get();
    
        $teamsAsMember = $user->teams()->get();
        $teamsAsOwner = $user->ownedTeams()->get();
        $teams = $teamsAsMember->concat($teamsAsOwner);
    
        $totalTasks = 0;
    
        foreach ($projects as $project) {
            $totalTasks += $project->tasks()->count();
        }
    
        $totalTasksStatusOne = 0;
    
        foreach ($finishedProjects as $project) {
            $totalTasksStatusOne += $project->tasks()->where('status', 1)->count();
        }

        if($totalTasks == 0){
            $taskDonePercent = ($totalTasksStatusOne / 1) * 100;
        } else{
            $taskDonePercent = ($totalTasksStatusOne / $totalTasks) * 100;
        }

        $projectsByTeam = [];

        
        $totalProjects = $projects->count();

        
        foreach ($teams as $team) {
            $teamProjects = $projects->filter(function ($project) use ($team) {
                return $project->team_id === $team->id;
            });

            $projectCount = $teamProjects->count();

            $percentage = ($projectCount / $totalProjects) * 100;

            $projectsByTeam[$team->name] = [
                'raw_count' => $projectCount,
                'percentage' => $percentage,
            ];

            $data = DB::table('projects')
            ->select(DB::raw('YEAR(updated_at) as year, MONTH(updated_at) as month, COUNT(*) as count'))
            ->where('status', 1)
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $formattedData = [];
        foreach ($data as $item) {
            $formattedData[] = [
                'year' => $item->year,
                'month' => $item->month,
                'count' => $item->count,
            ];
        }
        }
        
        return view('report.report', compact('totalProjects','finishedProjects', 'teams', 'totalTasksStatusOne', 'taskDonePercent', 'projectsByTeam', 'formattedData'));
    }


    public function swot()
    {
        // Verifique se o usuário está autenticado
        if (Auth::check()) {
            // Obtém o usuário autenticado
            $user = Auth::user();

            // Obtém o time associado ao usuário
            $currentTeam = $user->currentTeam;

            // Verifica se um time atual está definido para o usuário
            if ($currentTeam) {
                // Use o ID do time como parte da chave de cache
                $cacheKey = 'swot_data_' . $currentTeam->id;

                // Tente recuperar os dados da matriz SWOT do cache
                $swotData = cache($cacheKey);

                // Se os dados não estiverem no cache, inicialize-os como vazios
                if (!$swotData) {
                    $swotData = [
                        'strengths' => '',
                        'weaknesses' => '',
                        'opportunities' => '',
                        'threats' => '',
                    ];
                }

                // Passe os dados da matriz SWOT para a view
                // Passe os dados da matriz SWOT e o objeto currentTeam para a view
                // Passe os dados da matriz SWOT e o objeto currentTeam para a view
                return view('swot.swot', ['swotData' => $swotData, 'currentTeam' => $currentTeam]);


            } else {
                // O usuário não tem um time atual definido
                // Trate esse caso de acordo com sua lógica de negócios
            }
        } else {
            // O usuário não está autenticado
            // Trate esse caso de acordo com sua lógica de autenticação
        }
    }


}
