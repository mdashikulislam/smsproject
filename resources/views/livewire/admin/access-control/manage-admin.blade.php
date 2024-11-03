<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item"><a wire:navigate href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Access Control</li>
            <li class="breadcrumb-item active" aria-current="page">Manage Admin</li>
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
                                @include('admin.include.table-sortable-header',['title'=>'Email','name'=>'email'])
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Status','name'=>'status'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Created','name'=>'created_at'])
                            </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $data)
                            <tr wire:key="{{$data->id}}">
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->roles()->first()->name}}</td>
                                <td>{!!getStatusLabel($data->status)!!}</td>
                                <td>{{$data->created_at->format('Y-m-d H:i:s')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a   href='#' wire:click.prevent='edit({{$data->id}})' class='btn btn-sm btn-success text-white'> <i class='fas fa-edit'></i></a>
                                        <a   href='#' onclick="confirmDelete({{ $data->id }})" class='btn btn-sm btn-danger text-white'><i class='fas fa-trash'></i></a>
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
                        {{$users->links(data: ['scrollTo' => false])}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="curdModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form wire:submit.prevent="{{@$showEditModal ? 'update':'store'}}" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{@$showEditModal ? 'Edit':'Add New'}} User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Name</label>
                                <input type="text" wire:model="state.name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Email</label>
                                <input type="text" wire:model="state.email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            @if($showEditModal)
                            <div class="mb-3 col-12">
                                <p class="text-center">If you do not wish to change your password, leave both fields blank.</p>
                            </div>
                            @endif
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Password</label>
                                <input type="password" wire:model="state.password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" wire:model="state.password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Role</label>
                                <select class="form-control @error('role') is-invalid @enderror" wire:model="state.role">
                                    {!! getAdminRoleDropdown() !!}
                                </select>
                                @error('role')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" wire:model="state.status">
                                    {!! getStatusDropdown() !!}
                                </select>
                                @error('status')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            @if(@$showEditModal)
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
