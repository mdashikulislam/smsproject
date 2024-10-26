@extends('admin.layouts.app')
@section('title','Single Service')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Single Service</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Single Service</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>From ( Filter )</th>
                                <th>Message ( Filter )	</th>
                                <th>Is Other Site</th>
                                <th>Is Preset</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
@endpush
@push('script')
    <script src="{{asset('admin/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script>
        $(document).ready(function (){
            $('table').DataTable({
                processing: true,
                serverSide: true,
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 30,
                order: [[0, 'desc']],
                ajax: {
                    url: "{{ route('admin.single-service') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        defaultContent: "",
                    },
                    {
                        data: 'name',
                        name: 'name',
                        defaultContent: "",
                    },
                    {
                        data: 'price',
                        name: 'price',
                        defaultContent: "",
                    },
                    {
                        data: 'from_filter',
                        name: 'from_filter',
                        defaultContent: "",
                    },
                    {
                        data: 'message_filter',
                        name: 'message_filter',
                        defaultContent: "",
                    },
                    {
                        data: 'is_other_site',
                        name: 'is_other_site',
                        defaultContent: "",
                    },
                    {
                        data: 'status',
                        name: 'status',
                        defaultContent: "",
                    }
                ],
                columnDefs:[
                    {
                        targets: [6],
                        render: function(data, type, row) {
                            return data ? `<span class="badge badge-success">Active</span>` : `<span class="badge badge-danger">Inactive</span>`;
                        }
                    },
                ]
            });
        });
    </script>
@endpush
