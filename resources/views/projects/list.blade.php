@extends('layouts.main')


@section('content')

@php
  $pageTitle = 'Seus Projetos | InVision';
@endphp
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  .card-subtitle, .card-title {
    font-weight: 400;
  }

  .card-title {
      font-size: .875rem;
      color: #495057;
  }
  .card {
      margin-bottom: 24px;
      box-shadow: 0 0 0.875rem 0 rgba(33,37,41,.05);
  }
  .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: initial;
      border: 0 solid transparent;
      border-radius: .25rem;
  }
  .card-body {
      flex: 1 1 auto;
      padding: 1.25rem;
  }
  .card-header:first-child {
      border-radius: .25rem .25rem 0 0;
  }
  .card-header {
      border-bottom-width: 1px;
  }
  .pb-0 {
      padding-bottom: 0!important;
  }
  .card-header {
      padding: 1rem 1.25rem;
      margin-bottom: 0;
      background-color: #fff;
      border-bottom: 0 solid transparent;
  }

  .container{
    margin-top: 5%;
  }

</style>
<x-app-layout>

@php
  $totalProjects = count($projectData);
@endphp

 @if($totalProjects > 0)
{{-- <a href="/project/create" style="margin: 2%; width: 12rem; border-radius: 10px; padding: 0.5%; background-color: #6875f5; color: white; text-align: center; display: block; font-size: 20px;"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>&nbsp;&nbsp;Novo Projeto</a> --}}
  <div class="container" style="width: 90%;">
    {{-- <div class="row"> --}}
        
    

      {{-- PROJETOS EM ANDAMENTO --}}

       <?php $totalProjetosAndamento = 0;?>
        @foreach($projectData as $data)
          @if($data['project']->status == 0)
            <?php $totalProjetosAndamento = $totalProjetosAndamento + 1; ?>
          @endif
        @endforeach

<div class="container p-0">

    <a href="/project/create" class="btn float-right mt-n1" style="background-color: #6875f5; color: white;"><i class="fas fa-plus"></i> Novo projeto</a>
	<h1 class="h3 mb-3">Em andamento (<?php echo $totalProjetosAndamento; ?>)</h1>

	<div class="row">
  @foreach($projectData as $data)
    @if($data['project']->status == 0)
		<div class="col-12 col-md-6 col-lg-3">
			<div class="card">
      
				<div class="card-header px-4 pt-4">
					<div class="card-actions float-right">
						<div class="dropdown">
                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="/project/{{$data['project']->id}}">Editar</a></li>
                    <li><a class="dropdown-item" href="/project/{{$data['project']->id}}/deleted">Deletar</a></li>
                    <li><a class="dropdown-item" href="/project/{{$data['project']->id}}/ended">Finalizar</a></li>
                </ul>
            </div>
					</div>
					<h5 class="card-title mb-0"><a href="/project/{{$data['project']->id}}">{{$data['project']->projectName}}</a></h5> 
					<div class="badge bg-warning my-2">Em andamento</div>
				</div>
				<div class="card-body px-4 pt-2">
					<p>{{$data['project']->projectDescription}}</p>
          <div class="icones" style="display: flex; margin-top: 5%;">
            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
          </div>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item px-4 pb-4">
						<p class="mb-2 font-weight-bold">Progresso <span class="float-right">{{$data['taskDonePercent']}} %</span></p>
						<div class="progress progress-sm">
							<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$data['taskDonePercent']}}%;">
							</div>
						</div>
					</li>
				</ul>
			</div>
      
		</div>
    @endif
      @endforeach
	</div>
</div>









    {{-- PROJETOS FINALIZADOS --}}

    <?php $totalProjetosFinalizados = 0;?>
    @foreach($projectData as $data)
    @if($data['project']->status == 1)
        <?php $totalProjetosFinalizados = $totalProjetosFinalizados + 1; ?>
      @endif
    @endforeach
    
    
    <div class="container p-0">
	<h1 class="h3 mb-3">Finalizados (<?php echo $totalProjetosFinalizados; ?>)</h1>

	<div class="row">
  @foreach($projectData as $data)
    @if($data['project']->status == 1)
		<div class="col-12 col-md-6 col-lg-3">
			<div class="card">
      
				<div class="card-header px-4 pt-4">
					<div class="card-actions float-right">
						<div class="dropdown show">
							<a href="#" data-toggle="dropdown" data-display="static">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
							</a>
						</div>
					</div>
					<h5 class="card-title mb-0"><a href="/project/{{$data['project']->id}}">{{$data['project']->projectName}}</a></h5>  
					<div class="badge bg-success my-2">Finalizado</div>
				</div>
				<div class="card-body px-4 pt-2">
          <p>{{$data['project']->projectDescription}}</p>
          <div class="icones" style="display: flex; margin-top: 5%;">
            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
          </div>
				</div>
			</div>
      
		</div>
    @endif
      @endforeach
	</div>
</div>
      @if($totalProjetosFinalizados == 0)
          <p style="text-align: center; width: 100%; margin-top: 5%; margin-bottom: 5%; color: grey;">Não há projetos finalizados.</p>
        @endif
    </div>
    </div>
  </div> 
    
 @endif



 @if($totalProjects == 0)
    <div class="msg-sem-projetos" style="margin: auto; text-align: center; margin-top: 15%;">
        <h3 style="font-size: 32px;">Você ainda não faz parte de um projeto :(</h3>
        <br/>
        <p style="color: grey;">Não perca mais tempo e desfrute da agilidade de gerenciamento de seus projetos.</p>
        <br/><br/>
        <a href="/project/create" class="cadastrar-agora" style="background-color: darkgrey; color: white; padding: 1%;  border-radius: 10px; font-size: 22px;">Cadastrar agora</a>
    </div>
@endif 


</x-app-layout>
@endsection