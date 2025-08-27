@extends('layout.app')
@section('content')
    <div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">ADMINISTRATOR</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Konsultasi</h3>
                              
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <i class="fa-solid fa-comments fa-3x text-primary"></i>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        
                                            <h1 class="text-primary">{{$k}}</h1>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Pendampingan</h3>
                               
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <i class="fa-solid fa-handshake fa-3x text-primary"></i>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        
                                            <h1 class="text-primary">{{$p}}</h1>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Jadwal</h3>
                                
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <i class="fa-solid fa-calendar-days fa-3x text-primary"></i>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        
                                            <h1 class="text-primary">{{$j}}</h1>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Petugas</h3>
                               
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <i class="fa-solid fa-users fa-3x text-primary"></i>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        
                                            <h1 class="text-primary">{{$ua}}</h1>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection