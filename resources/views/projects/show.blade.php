  @extends('layouts.main')

  @section('title', 'Projetos | Listar')

  @section('content')

  <x-app-layout>

  <h1 style="text-align: center; font-size: 50px; margin-top: 5%;">{{$project->projectName}}</h1>
  <div style="text-align: center; margin-top: 0.8%;">

  @if($project->status == 0)

  <p style="font-size: 15px; color: grey;"><i class="fa-solid fa-circle fa-beat-fade" style="color: #fbac23;"></i>&nbsp;&nbsp;Em progresso </p>

  @endif

  @if($project->status ==1)

  <p style="font-size: 22px; color: grey;"><i class="fa-solid fa-circle-check" style="color: #49763d;"></i>&nbsp;&nbsp;Concluído</p>

  @endif

  </div>


  

  

  {{-- <h2 style="text-align: center; margin-top: 5%;">Cadastre uma nova task:</h2> --}}


  <form class="row g-3" style="width: 50%; margin: 2% auto 2% auto;" method="POST" action="/project/{{$project->id}}/task">
    @csrf
    <div class="col-md-12">
      <label for="inputEmail4" class="form-label">Tarefa</label>
      <input type="text" class="form-control" id="inputEmail4" name="taskName">
    </div>
    <div class="col-md-4">
      <label for="inputEmail4" class="form-label">Gravidade (G)</label>
      <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="g">
    </div>
    <div class="col-md-4">
      <label for="inputEmail4" class="form-label">Urgência (U)</label>
      <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="u">
    </div>
    <div class="col-md-4">
      <label for="inputEmail4" class="form-label">Tendência (T)</label>
      <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="t">
    </div>
    
    <div class="col-12">
      <button type="submit" class="btn btn-primary" style="background-color: #0d6efd;">Cadastrar</button>
    </div>
  </form>




      <table class="table" style="width: 70%; margin: auto; text-align:center;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tarefa</th>
        <th scope="col">GRAVIDADE</th>
        <th scope="col">URGÊNCIA</th>
        <th scope="col">TENDÊNCIA</th>
        <th scope="col">Total</th>
        <th scope="col">Ação</th>

      </tr>
    </thead>

    <tbody>
    <?php $i = 1;?>
    @foreach($tasks as $task)
      @if($task->status == 0)
    
        <tr>
          <th scope="row"><?php echo $i;?></th>
          <td>{{$task->taskName}}</td>
          <td>{{$task->G}}</td>
          <td>{{$task->U}}</td>
          <td>{{$task->T}}</td>
          <td>{{$task->Total}}</td>
          <td><a href="/project/{{$task->id}}/task/ended"><i class="fa-solid fa-check" style="color: #2b972c;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/project/{{$task->id}}/task/deleted"><i class="fa-solid fa-trash" style="color: #f52314;"></i></a></td>
        </tr>
      @elseif($task->status ==1)
      <tr style="background-color: lightgrey;">
          <th scope="row"><?php echo $i;?></th>
          <td>{{$task->taskName}}</td>
          <td>{{$task->G}}</td>
          <td>{{$task->U}}</td>
          <td>{{$task->T}}</td>
          <td>{{$task->Total}}</td>
          <td><b>Finalizado</b></td>
        </tr>
      @endif
        <?php $i = $i+1;?>
    @endforeach
    </tbody>
  </table>

  </x-app-layout>

  @endsection