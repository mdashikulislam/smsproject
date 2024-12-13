<section class="section section-padding-2 bg-color-dark">
    <div class="container">
        <div class="section-heading heading-light-left">
            <h2 class="title">Free SMS UK Phone Numbers</h2>
            <span class="subtitle">We change the free numbers every month to new ones</span>
            <p class="opacity-50">
                Please note the free numbers are not exclusive to you
                Messages show below are viewable by everyone
                <span class="d-block">
                    <a wire:navigate href="{{route('pricing')}}">For your own new private SMS numbers and messages click here</a>
                </span>
            </p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-12">
                <ul class="freenumber-list">
                    @forelse($freeSims as $sim)
                    <li class="sal-animate" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">
                        <span onclick="copyToClipboard('{{$sim->phone_number}}')" class="copybtn">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                            >
                                <path
                                    d="M384 352H224c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32H332.1c4.2 0 8.3 1.7 11.3 4.7l67.9 67.9c3 3 4.7 7.1 4.7 11.3V320c0 17.7-14.3 32-32 32zM433.9 81.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H224c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V416H256v32c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V192c0-17.7 14.3-32 32-32h64V128H64z"
                                />
                            </svg>
                        </span>
                        <h4  class="title">{{$sim->phone_number}}</h4>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-lg-9 col-12">
                @livewire('frontend.component.inbox',['imsi'=>$freeSims->pluck('imsi')->unique()->toArray()])
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
@push('script')
    <script>
        function copyToClipboard(text) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            navigator.clipboard.writeText(text)
                .then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Text copied to clipboard!'
                    });
                })
                .catch(err => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Failed to copy text'
                    });
                });
        }
    </script>
@endpush
