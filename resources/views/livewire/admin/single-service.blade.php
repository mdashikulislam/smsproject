<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item"><a wire:navigate href="{{route('admin.dashboard')}}">Dashboard</a></li>
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
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex" style="gap: 1rem;">
                            <div class="mb-3" style="width: 150px;">
                                <select class="form-control" wire:model.live="perPage">
                                    {!! getDatatableShowItemDropdown() !!}
                                </select>
                            </div>
                            @if($isDeleteActive)
                            <div class="mb-3" style="width: 200px;">
                                <a href="#" onclick="bulkDestroy()" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i>Delete</a>
                            </div>
                            @endif
                        </div>
                        <div class="mb-3" style="width: 300px;">
                            <input class="form-control" type="text" wire:model.live.debounce.500="search" placeholder="Search">
                        </div>
                    </div>

                    <table class="table" >
                        <thead>
                        <tr>
                            <th>
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox" wire:model.live="is_checked_all"
                                           wire:change="checkAll"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Id','name'=>'id'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Name','name'=>'name'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Price','name'=>'price'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'From ( Filter )','name'=>'from_filter'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Message ( Filter )','name'=>'message_filter'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Is Other Site','name'=>'is_other_site'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Status','name'=>'status'])
                            </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr wire:key="{{$service->id}}">
                                    <td>
                                        <div class="flex items-center">
                                            <input type="checkbox" wire:model.live="checked" value="{{ $service->id }}" wire:change="singleCheck"
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </div>
                                    </td>
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
                                <t>
                                    <td colspan="9" class="text-center">No record found</td>
                                </t>
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

