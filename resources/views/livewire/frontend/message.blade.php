<section class="section section-padding-2 bg-color-dark">
    <div class="container">
        <div class="section-heading heading-light-left">
            <h2 class="title">Latest Messages</h2>
            <span class="subtitle">(new messages will appear within 45 seconds)</span>
            <p class="opacity-50">
                If your messages do not arrive <a href="{{route('contact-us')}}" wire:navigate>contact</a> us and we will help you
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                @livewire('frontend.component.inbox',['imsi' => $this->sims])
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
