@extends('layouts.main')



@section('content')

    @php
    $pageTitle = 'Relatórios | InVision';
    @endphp

    <x-app-layout>

    @php
    $projetosFinalizados = 0;
    @endphp

    @foreach($finishedProjects as $project)
        @php
        $projetosFinalizados = $projetosFinalizados + 1; 
        @endphp
    @endforeach

    @php
    $times = 0;
    @endphp

    @foreach($teams as $team)
        @php
        $times = $times + 1; 
        @endphp
    @endforeach


    <!-- Custom fonts for this template-->
        


        

        <!-- Page Wrapper -->
        <div id="wrapper" style="width: 90%; margin: 2% auto;">

            

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    
                        

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Relatórios</h1>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Imprimir Relatório</a>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold mb-1" style="color: #ffc187; font-size: 18px; font-weight: bold;">
                                                    Total de Projetos</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalProjects; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x" style="color: #ffc187;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold mb-1" style="color: #6875f5; font-size: 18px; font-weight: bold;">
                                                    Projetos finalizados</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $projetosFinalizados; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x" style="color: #6875f5;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold mb-1" style="color: #638754; font-size: 18px; font-weight: bold;">
                                                    Times</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $times; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa-solid fa-people-group fa-2x" style="color: #638754;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold mb-1" style="color: #0dcaf0; font-size: 18px; font-weight: bold;">Tasks concluídas
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $taskDonePercent; ?>%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: <?php echo $taskDonePercent; ?>%" aria-valuenow="<?php echo $taskDonePercent; ?>" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x" style="color: #0dcaf0;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            
                        </div>

                        <!-- Content Row -->

                        

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">

                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold">Total de Projetos por Time</h6>
                                    </div>
                                    <div class="card-body">
                                    @foreach ($projectsByTeam as $teamName => $data)
                                        <h4 class="small font-weight-bold">{{ $teamName }} <span
                                                class="float-right">{{ $data['raw_count'] }}</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $data['percentage'] }}%"
                                                aria-valuenow="{{ $data['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>

                                
                                

                            </div>

                            <div class="col-lg-6 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold">Insights</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; margin: auto;"
                                                src="img/vector.avif" alt="...">
                                        </div>
                                        <p>Add some quality, svg illustrations to your project courtesy of <a
                                                target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                            constantly updated collection of beautiful svg images that you can use
                                            completely free and without attribution!</p>
                                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                            unDraw &rarr;</a>
                                    </div>
                                </div>

                                <!-- Approach -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                    </div>
                                    <div class="card-body">
                                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                            CSS bloat and poor page performance. Custom CSS classes are used to create
                                            custom components and custom utility classes.</p>
                                        <p class="mb-0">Before working with this theme, you should become familiar with the
                                            Bootstrap framework, especially the utility classes.</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>


    </x-app-layout>
@endsection