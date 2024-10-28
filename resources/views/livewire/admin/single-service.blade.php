<div>
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
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Single Service</h3>
                        <a href="" wire:click.prevent="addNew" class="btn btn-primary btn-sm btn-icon-text"><i class="fas fa-plus fa-fw" ></i>Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>From ( Filter )</th>
                            <th>Message ( Filter )	</th>
                            <th>Is Other Site</th>
                            <th>Is Preset</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td>{{$service->id}}</td>
                                    <td>{{$service->name}}</td>
                                    <td>£{{$service->price}}</td>
                                    <td>{{$service->from_filter}}</td>
                                    <td>{{$service->message_filter}}</td>
                                    <td>{!! getYesNoLabel($service->is_other_site) !!}</td>
                                    <td>{!! getStatusLabel($service->status) !!}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a   href='#' wire:click.prevent='edit({{$service->id}})' class='btn btn-sm btn-warning text-white'> <i class='fas fa-edit'></i></a>
                                            <a   href='#' onclick="confirmDelete({{ $service->id }})" class='btn btn-sm btn-danger text-white'><i class='fas fa-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{$services->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="curdModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit.prevent="{{$showEditModal ? 'update':'store'}}" autocomplete="off">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$showEditModal ? 'Edit':'Add New'}} Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" wire:model="state.name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" step="any" wire:model="state.price" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">From (Filter) </label>
                            <input type="text"  wire:model="state.from_filter" class="form-control @error('from_filter') is-invalid @enderror">
                            @error('from_filter')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message (Filter)</label>
                            <input type="text"  wire:model="state.message_filter" class="form-control @error('message_filter') is-invalid @enderror">
                            @error('message_filter')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Is Other Site</label>
                            <select class="form-control" wire:model="state.is_other_site">
                                {!! getYesNoDropdown() !!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" wire:model="state.status">
                                {!! getStatusDropdown() !!}
                            </select>
                            @error('status')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            @if($showEditModal)
                                Update
                            @else
                                Save
                            @endif
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>


@push('style')
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endpush
@push('script')
    <script src="{{asset('admin/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fillTable();
            // Livewire.on('reloadTable', () => {
            //     $('table').DataTable().destroy();
            //     fillTable();
            // });

        });
        function fillTable(){
            $('tables').DataTable({
                processing: true,
                serverSide: true,
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 30,
                order: [[0, 'desc']],
                ajax: {
                    url: "{{ route('admin.single-service.datatable') }}",
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
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        defaultContent: "",
                        searchable: false
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
        }
    </script>
@endpush
