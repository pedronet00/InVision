  @extends('layouts.main')

  @section('title', 'Projetos | Listar')

  @section('content')

  @php
    $pageTitle = 'Projeto | InVision';
  @endphp

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


  <div class="table-responsive">
    <table class="table" style="width: 50%; margin: 2% auto; 5% auto">
      <tr>
        <form class="row g-3" style="width: 50%; margin: 2% auto 2% auto;" method="POST" action="/project/{{$project->id}}/task">
          @csrf
          <td scope="col">Nova task</td>
          <td scope="col"><input type="text" class="form-control" id="inputEmail4" name="taskName" style="background-color: #f3f4f6; border-radius: 5px;"></td>
          <td scope="col"><input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="g" style="background-color: #f3f4f6; border-radius: 5px;"></td>
          <td scope="col"><input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="u" style="background-color: #f3f4f6; border-radius: 5px;"></td>
          <td scope="col"><input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="t" style="background-color: #f3f4f6; border-radius: 5px;"></td>
          <td scope="col"></td>
          <td scope="col" colspan="2"><button type="submit" class="btn btn-primary" style="background-color: #8fa3f7; border: none;">Cadastrar</button></td>
        </form>
      </tr>
    </table>
  </div>

  <div class="table-responsive">
    <table class="table" style="width: 70%; margin: 5% auto; text-align:center;">
      <thead>
        <tr style="margin-top: 5%;">
          <th scope="col" style="background-color: #8fa3f7; color: white;">#</th>
          <th scope="col" style="background-color: #8fa3f7; color: white;">Tarefa</th>
          <th scope="col" style="background-color: #8fa3f7; color: white;">GRAVIDADE</th>
          <th scope="col" style="background-color: #8fa3f7; color: white;">URGÊNCIA</th>
          <th scope="col" style="background-color: #8fa3f7; color: white;">TENDÊNCIA</th>
          <th scope="col" style="background-color: #8fa3f7; color: white;">Total</th>
          <th scope="col" style="background-color: #8fa3f7; color: white;">Ação</th>
        </tr>
      </thead>

      <tbody style="margin-top: 5%;">

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
  </div>

</x-app-layout>

  @endsection