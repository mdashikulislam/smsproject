<section class="section section-padding-2 bg-color-dark">
    <div class="container">
        <div class="section-heading heading-light-left">
            <h2 class="title">My Number List</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-wrap">
                    <div class="responsive-table">
                        <table class="table text-white table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th class="from">Action</th>
                                    <th class="to">Number</th>
                                    <th class="message">Nick Name</th>
                                    <th class="time">Status</th>
                                    <th class="time">Expiry</th>
                                    <th class="time">Network Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($numbers as $number)
                                    <tr class="{{$number->isActive() ? 'table-success':'table-danger'}}">
                                        <td>
                                            @if(!$number->isActive())
                                            <a href="#" onclick="confirmDelete({{$number->id}})" class="text-danger"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{$number->sim->phone_number}}</td>
                                        <td>{{$number->name}}</td>
                                        <td>{!! $number->status_label !!}</td>
                                        <td>{{$number->end_date}}</td>
                                        <td>{{$number->sim->network_type_name}}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <ul class="list-unstyled shape-group-10">
        <li class="shape shape-1">
            <img
                src="{{asset('frontend/assets/images/others/line-9.png')}}"
                alt="Circle"
            />
        </li>
        <li class="shape shape-2">
            <img
                src="{{asset('frontend/assets/images/others/bubble-42.png')}}"
                alt="Circle"
            />
        </li>
        <li class="shape shape-3">
            <img
                src="{{asset('frontend/assets/images/others/bubble-43.png')}}"
                alt="Circle"
            />
        </li>
    </ul>
</section>
