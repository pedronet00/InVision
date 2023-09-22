@extends('layouts.main')

@section('content')

@php
  $pageTitle = 'Home | InVision';
@endphp

<style>

    .cadastrar-agora:hover{
        transform: scale(1.2);
    }

    


.l-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
  width: 100%;
  max-width: 1200px;
  padding: 30px;
  
  @media screen and (max-width: 760px) {
    display: block;
  }
  
}

  

</style>

<x-app-layout>



<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" style="width: 90%; margin: 5% auto;">


  @if(count($projects) > 0)


      @foreach($projects as $project)
          @if($project->status == 0)

              <div class="col">
                <div class="card" style="background-color: #6875f5; color: white; text-align: center;">
                  <div class="card-body">
                    <a href="/project/{{$project->id}}" style="text-decoration: none; color: white; font-size: 25px; " class="card-title">{{$project->projectName}}</a>
                    <p class="card-text" style="color: lightgrey; text-align: center;">{{$project->projectDescription}}</p>
                    <div class="gut" style="display: flex; justify-content: space-evenly; margin-top: 5%;">
                        <p><span style="color: white;">G:</span> <span style="font-size: 25px; font-weight: bold;">{{$project->G}}</span></p>
                        <p><span style="color: white;">U:</span> <span style="font-size: 25px; font-weight: bold;">{{$project->U}}</span></p>
                        <p><span style="color: white;">T:</span> <span style="font-size: 25px; font-weight: bold;">{{$project->T}}</span></p>
                    </div>
                  </div>
                </div>
              </div>
          @endif
      @endforeach
  @else
      <div class="msg-sem-projetos" style="margin: auto; text-align: center;">
          <h3 style="font-size: 32px;">Você não tem nenhum projeto em andamento :(</h3>
          <br/>
          <p style="color: grey;">Não perca mais tempo e desfrute da agilidade de gerenciamento que a InVision te proporciona.</p>
          <br/>
          <a href="/project/create" class="cadastrar-agora" style="background-color: #6875f5; color: white; padding: 2%;  border-radius: 10px; font-size: 22px;">Novo projeto</a>
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

<div class="l-container" style="width: 90%; margin: auto;">
  <div class="b-game-card" style="background-color: #f3f4f6;">
    <div class="b-game-card__cover" style="text-align: center;">
      <h2 style="font-size: 32px; color: #6875f5;"><span style="font-size: 70px;">S</span>trength</h2>
      <small style="color: grey;">Forças</small>
      <p style="margin-top: 10%;"> São as características internas positivas da empresa, como recursos, habilidades, vantagens competitivas e ativos que a organização possui. As forças destacam, basicamente, o que a empresa faz bem - seus pontos fortes.</p>
    </div>
  </div>
  <div class="b-game-card" style="background-color: #f3f4f6;">
    <div class="b-game-card__cover" style="text-align: center;">
      <h2 style="font-size: 32px; color: #6875f5;"><span style="font-size: 70px;">W</span>eakness</h2>
      <small style="color: grey;">Fraquezas</small>
      <p style="margin-top: 10%;">São as características internas negativas da empresa, como deficiências, limitações e áreas em que a organização está em desvantagem em relação à concorrência. As fraquezas apontam aspectos onde a empresa precisa melhorar.</p>
    </div>
  </div>
  <div class="b-game-card" style="background-color: #f3f4f6;">
    <div class="b-game-card__cover" style="text-align: center;">
      <h2 style="font-size: 32px; color: #6875f5;"><span style="font-size: 70px;">O</span>pportunities</h2>
      <small style="color: grey;">Oportunidades</small>
      <p style="margin-top: 10%;">São fatores externos positivos que podem beneficiar a organização, como tendências de mercado, demanda crescente, mudanças regulatórias favoráveis ou novas oportunidades de negócios. Identificar oportunidades ajuda a empresa a explorar novas áreas de crescimento.</p>
    </div>
  </div>
  <div class="b-game-card" style="background-color: #f3f4f6;">
    <div class="b-game-card__cover" style="text-align: center;">
      <h2 style="font-size: 32px; color: #6875f5;"><span style="font-size: 70px;">T</span>hreats</h2>
      <small style="color: grey;">Ameaças</small>
      <p style="margin-top: 10%;">São fatores externos negativos que podem representar desafios para a organização, como concorrência intensa, mudanças no mercado, crises econômicas ou regulamentações desfavoráveis. Reconhecer ameaças ajuda a empresa a se preparar e a se defender contra possíveis problemas.</p>
    </div>
  </div>
  
</div>


</x-app-layout>
@endsection