<div>
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
                    <li wire:key="{{$service->id}}">
                        <div class="single-service-wrap">
                            <h4>
                                <a href="/from/anster">{{$service->name}}</a>
                            </h4>
                            <span>£{{$service->price}}</span>
                            <span
                                wire:click.prevent="buy({{$service->id}})"
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
    <div class="modal fade" id="buyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <h4>Buy {!! $state['name'] !!} Service</h4>
                    <ul class="buy-modal-item">
                        <li>
                            <span>Network Type</span>
                            <select>
                                <option value="">ANy</option>
                            </select>
                        </li>
                        <li>
                            <span>Duration</span>
                            <strong>{{SINGLE_SERVICE_DURATION}}</strong>
                        </li>
                        <li>
                            <span>Price</span>
                            <strong>£{{$state['price']}}</strong>
                        </li>
                        <li>
                            <span>Discount</span>
                            <strong>Price</strong>
                        </li>
                        <li>
                            <span>Coupon</span>
                            <strong>Price</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('buy-modal', event => {
            $('#buyModal').modal('show');
        });
    </script>
@endpush
@push('style')
    <style>
        .buy-modal-item{
            margin-left: 0;
            padding: 20px;
        }
        .buy-modal-item li{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
    </style>
@endpush
