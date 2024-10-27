<section class="section section-padding-2 bg-color-dark">
    <div class="container">
        <div class="section-heading mb-0 heading-light-left">
            <h2 class="title">Choose Your Service</h2>
            <p>
                Search for the website you want to verify and click
                ‘Buy’ <br />
                Only choose ‘Other Website’ if the service you want
                to verify is not on the list
            </p>
        </div>
        <div class="mb-3">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12">
                    @persist('search')
                        <input wire:model.live.debounce.350ms="search" type="text" class="form-control" placeholder="Search Your website">
                    @endpersist
                </div>
            </div>
        </div>
        <ul class="service-wrapper">
            @forelse($services as $service)
                <li>
                    <div class="single-service-wrap">
                        <h4>
                            <a href="/from/anster">{{$service->name}}</a>
                        </h4>
                        <span>£{{$service->price}}</span>
                        <span
                            data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"
                            class="buybtn">Buy</span>
                    </div>
                </li>
            @empty

            @endforelse
        </ul>
    </div>
    <ul class="shape-group-3 list-unstyled">
        <li class="shape shape-2">
            <img
                src="{{asset('frontend/assets/images/others/bubble-4.png')}}"
                alt="shape"
            />
        </li>
    </ul>
</section>
