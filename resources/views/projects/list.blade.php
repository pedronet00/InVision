@extends('layouts.main')


@section('content')

@php
  $pageTitle = 'Seus Projetos | InVision';
@endphp


<x-app-layout>


@if(count($projects) > 0)
<a href="/project/create" style="margin: 2%; width: 12rem; border-radius: 10px; padding: 0.5%; background-color: #6875f5; color: white; text-align: center; display: block; font-size: 20px;"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>&nbsp;&nbsp;Novo Projeto</a>
  <div class="container">
    <div class="row">
        
    

      {{-- PROJETOS EM ANDAMENTO --}}

      <?php $totalProjetosAndamento = 0;?>
        @foreach($projects as $project)
          @if($project->status == 0)
            <?php $totalProjetosAndamento = $totalProjetosAndamento + 1; ?>
          @endif
        @endforeach

      <h1 style="text-align: center; margin: auto; font-size: 32px;">Em andamento (<?php echo $totalProjetosAndamento; ?>) </h1>
      
      <div class="row" style="margin: 5% auto;">
        @foreach($projects as $project)
          @if($project->status == 0)
              <div class="card" style="width: 18rem; margin: 2% auto; height: 200px;">
                <div class="card-body">
                  <div class="textos" style="height: 50%;">
                    <h5 class="card-title" style="font-size: 25px; font-weight: bold; color: #6875f5;">{{$project->projectName}}</h5>
                    <p class="card-text" style="color: grey;">{{$project->projectDescription}}</p>
                    <br/>
                    <p class="card-text">Time: {{$project->team->name}}</p>
                  </div>
                  <div style="margin: 15% auto; font-size: 20px; text-align: center;">
                    <a href="/project/{{$project->id}}" class="card-link" ><i class="fa-solid fa-pen-to-square" style="color: #6875f5;"></i></a>
                    <a href="/project/{{$project->id}}/deleted" class="card-link"><i class="fa-solid fa-trash" style="color: #cb3434;"></i></a>
                    <a href="/project/{{$project->id}}/ended" class="card-link"><i class="fa-solid fa-circle-check" style="color: #197127;"></i></i></a>
                  </div>
                </div>
              </div>
           
          @endif
        @endforeach
        
           </div>
      </div>





    {{-- PROJETOS FINALIZADOS --}}

    <?php $totalProjetosFinalizados = 0;?>
    @foreach($projects as $project)
      @if($project->status == 1)
        <?php $totalProjetosFinalizados = $totalProjetosFinalizados + 1; ?>
      @endif
    @endforeach
    
    
    <h1 style="text-align: center; margin: auto; font-size: 32px; margin-top: 5%;">Finalizados (<?php echo $totalProjetosFinalizados; ?>)</h1>
    

      <div class="row" style="margin: 5% auto;">
        @foreach($projects as $project)
        <?php $finalizados = 0; ?>
          @if($project->status == 1)
          <?php $finalizados = $finalizados + 1; ?>
              <div class="card" style="width: 18rem; margin: 2% auto; height: 200px;">
                <div class="card-body">
                  <div class="textos" style="height: 50%;">
                    <h5 class="card-title" style="font-size: 25px; font-weight: bold; color: #6875f5;"><a href="/project/{{$project->id}}">{{$project->projectName}}</a></h5>
                    <p class="card-text" style="color: grey;">{{$project->projectDescription}}</p>
                    <br/>
                    <p class="card-text">Time: {{$project->team->name}}</p>
                  </div>
                  <div style="margin: 15% auto; font-size: 20px; text-align: center;">
                    <h3 style="text-decoration: underline;">Projeto finalizado</h3>
                  </div>
                </div>
              </div>
           
          @endif
        @endforeach
        
           </div>
      </div>
      @if($finalizados == 0)
          <p style="text-align: center; width: 100%; margin-top: 10%; color: grey;">Não há projetos finalizados.</p>
        @endif
    </div>
    </div>
  </div> 
    
@endif



@if(count($projects) == 0)
    <div class="msg-sem-projetos" style="margin: auto; text-align: center; margin-top: 15%;">
        <h3 style="font-size: 32px;">Você ainda não cadastrou um projeto :(</h3>
        <br/>
        <p style="color: grey;">Não perca mais tempo e desfrute da agilidade de gerenciamento de seus projetos.</p>
        <br/><br/>
        <a href="/project/create" class="cadastrar-agora" style="background-color: darkgrey; color: white; padding: 1%;  border-radius: 10px; font-size: 22px;">Cadastrar agora</a>
    </div>
@endif
</x-app-layout>
@endsection