<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item"><a wire:navigate href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Phone Number List</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Message List</h3>
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
                    <table class="table table-auto">
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
                                @include('admin.include.table-sortable-header',['title'=>'Com Port','name'=>'rec_time'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Sim','name'=>'phone_number'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'IMSI','name'=>'imsi'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Earning','name'=>'earning'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Status','name'=>'status'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Created','name'=>'status'])
                            </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($numbers as $data)
                            <tr wire:key="{{$data->id}}">
                                <td>
                                    <div class="flex items-center">
                                        <input type="checkbox" wire:model.live="checked" value="{{ $data->id }}" wire:change="singleCheck"
                                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td>M{{$data->machine}} S{{$data->slot}} {{$data->com_port}} ({{$data->computer}}) [{{getNetworkType($data->network_type)}}]</td>
                                <td>{{$data->phone_number}}</td>
                                <td>{{$data->imsi}}</td>
                                <td></td>
                                <td>{{$data->status}}</td>
                                <td>{{$data->created}}</td>
                                <td>
                                    <div class="btn-group">
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
                        {{$numbers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
