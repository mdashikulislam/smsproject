<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item"><a wire:navigate href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Access Control</li>
            <li class="breadcrumb-item active" aria-current="page">Role</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Role List</h3>
                        <a href="" wire:click.prevent="addNew" class="btn btn-primary btn-sm btn-icon-text"><i class="fas fa-plus fa-fw" ></i>Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex" style="gap: 1rem;">
                            <div class="mb-3" style="width: 150px;">
                                <select class="form-control" wire:model.live="perPage">
                                    {!! getDatatableShowItemDropdown() !!}
                                </select>
                            </div>
                        </div>
                        <div class="mb-3" style="width: 300px;">
                            <input class="form-control" type="text" wire:model.live.debounce.500="search" placeholder="Search">
                        </div>
                    </div>
                    <table class="table" >
                        <thead>
                        <tr>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Id','name'=>'id'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Name','name'=>'name'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Admins','name'=>'users_count'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Created','name'=>'created_at'])
                            </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $data)
                            <tr wire:key="{{$data->id}}">
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->users_count}}</td>
                                <td>{{$data->created_at->format('Y-m-d H:i:s')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a   href='#'  class='btn btn-sm btn-warning text-white'> <i class='fas fa-cog'></i></a>
                                        @if($data->is_default != '1')
                                        <a   href='#' wire:click.prevent='edit({{$data->id}})' class='btn btn-sm btn-success text-white'> <i class='fas fa-edit'></i></a>
                                        <a   href='#' onclick="confirmDelete({{ $data->id }})" class='btn btn-sm btn-danger text-white'><i class='fas fa-trash'></i></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <t>
                                <td colspan="9" class="text-center">No record found</td>
                            </t>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{$roles->links()}}
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
                        <h5 class="modal-title" id="exampleModalLabel">{{$showEditModal ? 'Edit':'Add New'}} Role</h5>
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
