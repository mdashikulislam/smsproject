<div class="card-wrap" wire:poll.visible.5s>
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <h3 class="title">Messages</h3>
            <div>
                <select wire:model.live="filter" class="form-control">
                    <option value="">All</option>
                    @forelse($phoneNumbers as $phoneNumber)
                        <option value="{{$phoneNumber->phone_number}}">{{$phoneNumber->phone_number}} ({{$phoneNumber->inboxes_count}})</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadioall" value="all">
                <label class="form-check-label" for="inlineRadioall">All</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="5">
                <label class="form-check-label" for="inlineRadio1">5 Min</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="10">
                <label class="form-check-label" for="inlineRadio2">10 Min</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="15">
                <label class="form-check-label" for="inlineRadio3">15 Min</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="20">
                <label class="form-check-label"  for="inlineRadio4">20 Min</label>
            </div>
            <div class="form-check form-check-inline">
                <a href="" wire:click.prevent="deleteMessage"><i class="fas fa-trash"></i></a>
            </div>
        </div>
    </div>
    <div class="responsive-table">
        <table class="table-style">
            <thead>
                <tr>
                    <th class="from">From</th>
                    <th class="to">To</th>
                    <th class="message">Message</th>
                    <th class="time">Time</th>
                </tr>
            </thead>
            <tbody>
            @forelse($inboxes as $data)
                <tr>
                    <td class="from">{{$data->from_no}}</td>
                    <td class="to">{{$data->phone_number}}</td>
                    <td class="message">
                        {{$data->message}}
                    </td>
                    <td class="time">
                        {{\Illuminate\Support\Carbon::parse($data->rec_time)->diffForHumans()}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No message found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{$inboxes->links(data: ['scrollTo' => false])}}
    </div>
</div>
@script
<script>
    document.addEventListener('confirm-delete',function (){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                @this.dispatch('confirmDelete')
            }
        });
    });
</script>
@endscript
