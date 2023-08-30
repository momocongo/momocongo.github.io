@extends('backend.superadmin.layouts.admin_master')
@section('admin')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                {{--                                    MODAL PAYMENT --}}
                   <section>
                       <div class="modal fade" id="modaldemo8-{{$event->id}}">
                           <div class="modal-dialog modal-dialog-centered text-center" role="document">
                               <div class="modal-content modal-content-demo">
                                   <div class="modal-header">
                                       <h6 class="modal-title">Paiement du ticket</h6><button aria-label="Close" class="btn-close"
                                                                                              data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                   </div>
                                   <div class="modal-body">
                                       <h6>Pour valider le paiement de vôtre ticket prière d'entrer un numéro de téléphone valide.</h6>

                                       <form class="login100-form validate-form" action="{{ route('ticket.paiement') }}" method="POST">
                                           @csrf
                                           <div class="panel panel-primary">
                                               <div class="tab-menu-heading">
                                                   <div class="tabs-menu1">
                                                       <!-- Tabs -->
                                                       <ul class="nav panel-tabs active">
                                                           <li class="mx-0 text-blue-momo"><a class="text-blue-momo" href="#tab6" data-bs-toggle="tab">Téléphone</a></li>
                                                       </ul>
                                                   </div>
                                               </div>
                                               <div class="panel-body tabs-menu-body p-0 pt-1">
                                                   <div class="tab-content">
                                                       <div class="tab-pane active" id="tab6">
                                                           <input class="input100 form-control d-none" type="text" name="event_id" value="{{$event->id}}"
                                                                  placeholder="Numéro facture">
                                                           <input class="input100 form-control d-none" type="number" name="montant" value="{{$event->prix_ticket}}"
                                                                  placeholder="Numéro facture">
                                                           <div id="mobile-num" class="wrap-input100 validate-input input-group mb-4">
                                                               <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                                   <span>+242</span>
                                                               </a>
                                                               <input class="input100 form-control" type="tel" name="telephone"
                                                                      placeholder="Numéro de téléphone">
                                                           </div>
                                                           <span>Note : Assurez vous de disposer des fonds suffisants pour valider ce
                                        paiement.</span>
                                                           <div class="modal-footer">
                                                               <button class="btn btn-blue-momo">Valider le paiement</button>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>

                                       </form>
                                   </div>
                               </div>
                   </section>
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 card-alert bg-text-momo p-2 rounded-1">{{ $event->typeEvent->name }}</h4>

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
                                    <div class="col-8">
                                        <h2 class="h2 mt-3"><i class="fa-user"></i>&nbsp;{{ $event->name }}</h2>
                                        <p class="card-title-desc"> {{ $event->description }}</p>
                                        <p class="h3 mb-2"><i class="fa fa-calendar-day"></i>&nbsp;&nbsp;<strong>{{ date('d.m.Y', strtotime($event->date_heure_debut))}}</strong></p>
                                        <span class="h6 mb-2"><i class="fa fa-clock"></i>&nbsp;&nbsp;<strong>{{ date('H:i', strtotime($event->date_heure_debut))}}</strong></span>
                                        &nbsp;&nbsp;<span class="h6"><i class="fa fa-location-arrow"></i> &nbsp;<strong>{{$event->lieu}}</strong></span>
                                        <p class="h5 mt-2"><i class="fa fa-dollar-sign"></i>&nbsp;&nbsp;<strong>{{ $event->prix_ticket }} FCFA</strong></p>
                                        <p>Réservez votre place maintenant en achetant un ticket.</p>
                                        <a id="datatable" class="modal-effect btn btn-sm btn-blue-momo" data-bs-effect="effect-fall"
                                           data-bs-toggle="modal" href=" #modaldemo8-{{$event->id}}" type="button"><i class="fa fa-money"></i>J'achète mon ticket</a>
                                    </div>

                                    <div class="col-4">
                                        <div class="card rounded-2">
                                            <div class="card-body">

                                                <img src="{{asset('upload/admin_images/images/'. $event->image)}}" class="img-rounded img-fluid rounded-3" width="800" height="400">
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
