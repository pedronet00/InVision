@extends('layouts.main')

@section('content')

<style>

    .cadastrar-agora:hover{
        transform: scale(1.2);
    }
</style>

<x-app-layout>




<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" style="width: 90%; margin: 5% auto;">

@foreach($projects as $project)
  <div class="col">
    <div class="card" style="background-color: #6875f5; color: white;">
      <div class="card-body">
        <a href="/project/{{$project->id}}" style="text-decoration: none; color: white; font-size: 25px;" class="card-title">{{$project->projectName}}</a>
        <p class="card-text" style="color: lightgrey;">{{$project->projectDescription}}</p>
        <div class="gut" style="display: flex; justify-content: space-evenly; margin-top: 5%;">
            <p><span style="color: white;">G:</span> <span style="font-size: 25px; font-weight: bold;">{{$project->G}}</span></p>
            <p><span style="color: white;">U:</span> <span style="font-size: 25px; font-weight: bold;">{{$project->U}}</span></p>
            <p><span style="color: white;">T:</span> <span style="font-size: 25px; font-weight: bold;">{{$project->T}}</span></p>
        </div>
      </div>
    </div>
  </div>
@endforeach

@if(count($projects) == 0)
    <div class="msg-sem-projetos" style="margin: auto; text-align: center;">
        <h3 style="font-size: 32px;">Você ainda não cadastrou um projeto :(</h3>
        <br/>
        <p style="color: grey;">Não perca mais tempo e desfrute da agilidade de gerenciamento de seus projetos.</p>
        <br/>
        <a href="/project/create" class="cadastrar-agora" style="background-color: darkgrey; color: white; padding: 2%;  border-radius: 10px; font-size: 22px;">Cadastrar agora</a>
    </div>

@endif


</div>




 <div id="generic_price_table" style="background-color: #f3f4f6;">   
        <section>
        
        <div class="container">
            
            <!--BLOCK ROW START-->
            <div class="row">
                <div class="col-md-4">
                
                  <!--PRICE CONTENT START-->
                    <div class="generic_content clearfix">
                        
                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">
                        
                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">
                            
                              <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Gravidade</span>
                                </div>
                                <!--//HEAD END-->
                                
                            </div>
                            <!--//HEAD CONTENT END-->
                            
                        </div>                            
                        <!--//HEAD PRICE DETAIL END-->
                        
                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                          <ul>
                              <li>1 - Sem gravidade</li>
                              <li>2 - Pouco grave</li>
                              <li>3 - Grave</li>
                              <li>4 - Muito grave</li>
                              <li>5 - Extremamente grave</li>
                                
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->
                        
                    </div>
                    <!--//PRICE CONTENT END-->
                        
                </div>
                
                <div class="col-md-4">
                
                  <!--PRICE CONTENT START-->
                    <div class="generic_content clearfix">
                        
                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">
                        
                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">
                            
                              <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Urgência</span>
                                </div>
                                <!--//HEAD END-->
                                
                            </div>
                            <!--//HEAD CONTENT END-->
                            
                        </div>                            
                        <!--//HEAD PRICE DETAIL END-->
                        
                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                          <ul>
                              <li>1 - Sem urgência</li>
                              <li>2 - Pouco urgente</li>
                              <li>3 - Urgente</li>
                              <li>4 - Muito urgente</li>
                              <li>5 - Extremamente urgente</li>
                                
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->
                        
                    </div>
                    <!--//PRICE CONTENT END-->
                        
                </div>
                <div class="col-md-4">
                
                  <!--PRICE CONTENT START-->
                    <div class="generic_content clearfix">
                        
                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">
                        
                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">
                            
                              <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Tendência</span>
                                </div>
                                <!--//HEAD END-->
                                
                            </div>
                            <!--//HEAD CONTENT END-->
                            
                        </div>                            
                        <!--//HEAD PRICE DETAIL END-->
                        
                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                          <ul>
                              <li>1 - Sem tendência de piorar</li>
                              <li>2 - Piorar em longo prazo</li>
                              <li>3 - Piorar em médio prazo</li>
                              <li>4 - Priorar em curto prazo</li>
                              <li>5 - Agravar rápido</li>
                                
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->
                        
                    </div>
                    <!--//PRICE CONTENT END-->
                        
                </div>
            </div>  
            <!--//BLOCK ROW END-->
            
        </div>
    </section>             
</div> 







</x-app-layout>
@endsection