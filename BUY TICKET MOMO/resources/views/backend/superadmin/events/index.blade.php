@extends('backend.superadmin.layouts.admin_master')
@section('admin')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Liste des évènements</h4>

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

                                <h4 class="card-title">Evènements</h4>
                                <div class="table-rep-plugin">
                                    @if(auth()->check()  && auth()->user()->role === 'organizer')
                                    <div class="ml-1 btn-group focus-btn-group row justify-end"><a
                                            href="{{ route('superadmin.create_event') }}"
                                            class=" d-inline-block btn btn-default"><span
                                                class="glyphicon glyphicon-screenshot"></span>
                                            Ajouter</a></div>
                                    @endif
                                    <ul class="divide-y divide-slate-100">
                                        @foreach($events as $event)
                                    <article class="flex items-start space-x-6 p-6">
                                        <img src="{{ asset('upload/admin_images/images/'. $event->image) }}" alt="" width="80" height="98" class="flex-none rounded-md bg-slate-100" />
                                        <div class="min-w-0 relative flex-auto">
                                            <h2 class="font-semibold text-[#ffcc00] truncate pr-20"><a class="d-inline-block text-[#004f71] hover:text-[#ffcc00]" href="{{route('superadmin.show_event', $event->id)}}">{{ $event->name }}</a></h2>
                                            <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                                                <div class="ml-2 font-bold text-[#004f71]">
                                                    <dt class="sr-only">Day</dt>
                                                    <dd><i class="fa fa-calendar"></i>&nbsp;&nbsp;{{ date('d.m.Y', strtotime($event->date_heure_debut)) }}</dd>
                                                </div>
                                                <div class="ml-5 font-bold text-[#004f71]">
                                                    <dt class="sr-only">Hour</dt>
                                                    <dd class="flex items-center">
                                                        <i class="fa fa-clock"></i>&nbsp;&nbsp;{{ date('H:i', strtotime($event->date_heure_debut)) }}
                                                    </dd>
                                                </div>


                                            </dl>
                                        </div>
                                    </article>
                                        @endforeach
                                    </ul>
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
