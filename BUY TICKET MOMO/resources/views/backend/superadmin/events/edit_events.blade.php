@extends('backend.superadmin.layouts.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Modifier un évnement </h4>
                                <form method="post"
                                    action="{{ route('superadmin.update_event', $event->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @include('backend/superadmin/events/_form')

                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>



            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#image').change((e) => {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
