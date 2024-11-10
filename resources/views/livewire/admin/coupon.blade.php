<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item"><a wire:navigate href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Coupons</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Coupons</h3>
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
                                @include('admin.include.table-sortable-header',['title'=>'Code','name'=>'code'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Value','name'=>'value'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Max Uses','name'=>'max_uses'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Uses','name'=>'uses'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Start','name'=>'start'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Expire','name'=>'expire'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Coupon Type','name'=>'type'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Use Type','name'=>'use_type'])
                            </th>
                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Eligible','name'=>'eligible'])
                            </th>

                            <th>
                                @include('admin.include.table-sortable-header',['title'=>'Created','name'=>'created_at'])
                            </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($coupons as $data)
                            <tr wire:key="{{$data->id}}">
                                <td>{{$data->id}}</td>
                                <td>{{$data->code}}</td>
                                <td>{{$data->value}}</td>
                                <td>{{$data->max_uses}}</td>
                                <td>{{$data->uses}}</td>
                                <td>{{\Illuminate\Support\Carbon::parse($data->start)->format('Y-m-d')}}</td>
                                <td>{{\Illuminate\Support\Carbon::parse($data->expire)->format('Y-m-d')}}</td>
                                <td>{{$data->type}}</td>
                                <td>{{$data->use_type}}</td>
                                <td>{{$data->eligible}}</td>
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
                        {{$coupons->links(data: ['scrollTo' => false])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="curdModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form wire:submit.prevent="{{$showEditModal ? 'update':'store'}}" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$showEditModal ? 'Edit':'Add New'}} Coupon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Code</label>
                                <input type="text" wire:model="state.code" class="form-control @error('code') is-invalid @enderror">
                                @error('code')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Max Uses</label>
                                <input type="number"  wire:model="state.max_uses" class="form-control @error('max_uses') is-invalid @enderror">
                                @error('max_uses')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Start</label>
                                <div class="input-group flatpickr">
                                    <input wire:model="state.start" type="text" class="form-control datepicker @error('start') is-invalid @enderror" placeholder="Select date" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                @error('start')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Expire</label>
                                <div class="input-group flatpickr">
                                    <input wire:model="state.expire" type="text" class="form-control datepicker @error('expire') is-invalid @enderror" placeholder="Select date" data-input>
                                    <span class="input-group-text input-group-addon" data-toggle><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                @error('expire')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Value</label>
                                <input type="number" step="any"  wire:model="state.value" class="form-control @error('value') is-invalid @enderror">
                                @error('value')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Coupon Type</label>
                                <select wire:model="state.type" class="form-control @error('type') is-invalid @enderror">
                                    {!! getCouponTypeDropdown() !!}
                                </select>
                                @error('type')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Use Type</label>
                                <select wire:model="state.use_type" class="form-control @error('use_type') is-invalid @enderror">
                                    {!! getCouponUseTypeDropdown() !!}
                                </select>
                                @error('use_type')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Eligible</label>
                                <select wire:model="state.eligible" class="form-control @error('eligible') is-invalid @enderror">
                                    {!! getCouponEligibleDropdown() !!}
                                </select>
                                @error('eligible')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12 col-12"  id="select2">
                                <label class="form-label">Select User</label>
                                <div wire:ignore>
                                    <select  style="width: 100%" multiple="multiple" wire:model="state.user"  class="form-control select2 @error('user') is-invalid @enderror">
                                        {!! getAllUserDropdown() !!}
                                    </select>
                                </div>
                                @error('user')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
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

@push('script')
    <script>
        document.addEventListener('livewire:navigated', () => {
            if($('.datepicker').length) {
                flatpickr(".datepicker", {
                    dateFormat: "Y-m-d",
                    minDate: "today",
                    maxDate: new Date().fp_incr(365)
                });
            }
            $(".select2").select2({
                dropdownParent: $('#curdModal'),
                multiple:true,
            });
            $(".select2").on("select2:select select2:unselect", function (e) {
                let selectedValues = $(this).val();
                const allUserValue = "All";
                if (selectedValues.includes(allUserValue) && e.params.data.id !== allUserValue) {
                    selectedValues = selectedValues.filter(value => value !== allUserValue);
                    $(this).val(selectedValues).trigger("change");
                }else if(selectedValues && selectedValues.includes(allUserValue) && selectedValues.length > 1){
                    $(this).val([allUserValue]).trigger("change");
                }
                @this.$set('state.user',selectedValues)
            });
        });
        window.addEventListener('update-select2',function (){
            $('.select2').val(@this.state.user).trigger('change');
        })
    </script>
@endpush
