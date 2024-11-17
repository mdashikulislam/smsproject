@livewireScripts
<!-- Jquery Js -->
<script src="{{asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/sal.js')}}"></script>
<script src="{{asset('frontend/assets/js/js.cookie.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.style.switcher.js')}}"></script>
<script src="{{asset('frontend/assets/js/tilt.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.nav.js')}}"></script>
<script src="{{asset('frontend/assets/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.hook('request', ({ fail }) => {
            fail(({ status, preventDefault }) => {
                if (status === 419) {
                    window.location.reload();
                }
            })
        })
    });
    window.addEventListener('toast',event =>{
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
        Toast.fire({
            icon: event.detail.type,
            title: event.detail.message
        });
    });
</script>
@stack('script')

