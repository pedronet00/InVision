@extends('layouts.main')

@section('title', 'Cadastrar Projeto')

@section('content')

<x-app-layout>

    <h2 style="text-align: center; font-size: 50px; margin-top: 5%;">Cadastrar Projeto</h2>

    <form style="width: 40%; margin: auto; margin-top: 5%;" method="POST" action="/project">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome do Projeto</label>
            <input type="text" class="form-control" id="projectName" aria-describedby="projectName" name="projectName">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descrição do Projeto</label>
            <input type="text" class="form-control" id="projectDescription" name="projectDescription">
        </div>
        <div class="mb-3">
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
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="g">
            </div>
            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Urgência (U)</label>
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="u">
            </div>
            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Tendência (T)</label>
                <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="t">
            </div>
        </div>  

        <br/>
            
            <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; color: white;">Cadastrar</button>
    </form>

    

</x-app-layout>

@endsection