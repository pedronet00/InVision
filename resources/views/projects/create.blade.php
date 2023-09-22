@extends('layouts.main')

<style>

    @media(max-width: 375px){
        .vh-100{
            margin: 10% auto;
        }
    }
</style>

@php
  $pageTitle = 'Criar Projeto | InVision';
@endphp

@section('content')

<x-app-layout>

    {{-- <h2 style="text-align: center; font-size: 50px; margin-top: 5%;">Cadastrar Projeto</h2>

    <form style="width: 40%; margin: auto; margin-top: 5%;" method="POST" action="/project">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome do Projeto</label>
            <input type="text" class="form-control" id="projectName" aria-describedby="projectName" name="projectName" style="background-color: #f3f4f6; border-radius: 5px;">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descrição do Projeto</label>
            <input type="text" class="form-control" id="projectDescription" name="projectDescription" style="background-color: #f3f4f6; border-radius: 5px;">
        </div>
        {{-- <div class="mb-3">
            <label for="teamSelection" class="form-label">Time</label>
            <select id="teamSelection" class="form-control" name="teamId">
                @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
            </select>
        </div> 
        
         <div style="display: flex; justify-content: space-between"> 

            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Gravidade (G)</label>
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="g" style="background-color: #f3f4f6; border-radius: 5px;">
            </div>
            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Urgência (U)</label>
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="u" style="background-color: #f3f4f6; border-radius: 5px;">
            </div>
            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Tendência (T)</label>
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="t" style="background-color: #f3f4f6; border-radius: 5px;">
            </div>
        </div>  

        <br/>
            
            <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; color: white;">Cadastrar</button>
    </form> --}}
    
    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100" style="background-color: #eee;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black">
          <div class="card-body p-md-5" style="width: 100%; max-height: 700px;">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color: #6875f5;">Cadastre um projeto</p>

                <form class="mx-1 mx-md-4" method="POST" action="/project">
                @csrf

                  <div class="d-flex flex-row align-items-center mb-4">
                    {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Nome do Projeto</label>
                      <input type="text" id="form3Example1c" class="form-control" name="projectName"/>    
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    {{-- <i class="fa-solid fa-list fa-lg me-3 fa-fw"></i> --}}
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Descrição do Projeto</label>
                      <input type="text" id="form3Example3c" class="form-control" name="projectDescription"/>
                    </div>
                  </div>

                  <div style="display: flex; justify-content: space-between; width: 100%; margin: auto;"> 

            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Gravidade</label>
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="g" style="border-radius: 5px;">
            </div>
            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Urgência</label>
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="u" style="border-radius: 5px;">
            </div>
            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Tendência</label>
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="t" style="border-radius: 5px;">
            </div>
        </div> 


                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary btn-lg" style="background-color: #6875f5; border: none; color: white; margin-top: 5%;">Cadastrar</button>   
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://img.freepik.com/free-vector/project-management-business-process-planning-workflow-organization-colleagues-working-together-teamwork_335657-2469.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</x-app-layout>

@endsection