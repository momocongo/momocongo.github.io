@extends('backend.superadmin.layouts.admin_master')
@section('admin')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                {{--                                    MODAL PAYMENT --}}

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 card-alert bg-text-momo p-2 rounded-1">{{ $ticket->event->typeEvent->name }}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Events</a></li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8 align-content-center text-md-center">
                                        <h2 class="h2 mt-3"><i class="fa-user"></i>&nbsp;{{ $ticket->event->name }}</h2>
                                        <p class="card-title-desc"> {{ $ticket->event->description }}</p>
                                        <p class="h3 mb-2"><i class="fa fa-calendar-day"></i>&nbsp;&nbsp;<strong>{{ date('d.m.Y', strtotime($ticket->event->date_heure_debut))}}</strong></p>
                                        <span class="h6 mb-2"><i class="fa fa-clock"></i>&nbsp;&nbsp;<strong>{{ date('H:i', strtotime($ticket->event->date_heure_debut))}}</strong></span>
                                        &nbsp;&nbsp;<span class="h6"><i class="fa fa-location-arrow"></i> &nbsp;<strong>{{$ticket->event->lieu}}</strong></span>
                                    </div>

                                    <div class="col-lg-4 col-md-12 text-center">
                                        <div class="card rounded-2">
                                            <div class="card-body">
                                               {!!$ticket->code_qr!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div> <!-- end col -->

                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <script>
            let formActive = document.querySelector('.form-active');
            let formInactive = document.querySelector('.form-inactive');

            document.querySelectorAll('.checkbox').forEach((button) => {
                button.addEventListener('click', makeactive);
            });

            document.querySelectorAll('.incheck').forEach((button) => {
                button.addEventListener('click', makeInactive);
            });



            function makeactive() {
                let action = this.getAttribute('href');
                formActive.setAttribute('action', action);
                formActive.submit();
            }



            function makeInactive() {
                let action = this.getAttribute('href');
                formInactive.setAttribute('action', action);
                formInactive.submit();

            }
        </script>
@endsection
