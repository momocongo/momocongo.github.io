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
                            <h4 class="mb-sm-0">Liste des tickets</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Exams</a></li>
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

                                <h4 class="card-title">Tickets</h4>
                                <p class="card-title-desc">Liste complète des tickets.</p>


                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Numéro du ticket
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Evènement
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date de l'évènement
                                            </th>

                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tickets as $ticket)
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$ticket->ticket_number}}
                                            </th>
                                            <td class="px-6 py-4">
                                               {{$ticket->event->name}}
                                            </td>
                                            <td class="px-6 py-4">
                                               {{$ticket->event->date_heure_debut}}
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{route('superadmin.show_ticket', $ticket->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>


                            </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
