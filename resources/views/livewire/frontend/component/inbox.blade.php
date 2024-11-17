<div class="card-wrap" wire:poll.visible.5s>
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="title">Messages</h3>
        <div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="5min">
                <label class="form-check-label" for="inlineRadio1">5 Min</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="10min">
                <label class="form-check-label" for="inlineRadio2">10 Min</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="15min">
                <label class="form-check-label" for="inlineRadio3">15 Min</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" wire:model="duration" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="20min">
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
            @endforelse
            </tbody>
        </table>
        {{$inboxes->links(data: ['scrollTo' => false])}}
    </div>
</div>
