<!-- toastr-notifications.blade.php -->

<script>
    toastr.options = {};

    function playAlertSound(soundFilePath) {
        var alertSound = new Audio(soundFilePath);
        alertSound.play();
    }

    @if(session('success'))
    toastr.options.onShown = function() {
        playAlertSound("{{ asset('sounds/success.wav') }}");
    };
    toastr["success"]("{{ session('success') }}");
    @elseif(session('info'))
    toastr.options.onShown = function() {
        playAlertSound("{{ asset('sounds/error.wav') }}");
    };
    toastr["info"]("{{ session('info') }}");
    @elseif (session('warning'))
    toastr.options.onShown = function() {
        playAlertSound("{{ asset('sounds/error.wav') }}");
    };
    toastr["error"]("{{ session('warning') }}");
    @endif
</script>
