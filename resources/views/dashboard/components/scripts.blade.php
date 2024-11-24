<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery/jquery-ui.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/bootstrap/popper.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/bootstrap/bootstrap.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/moment/moment.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/accordion.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/apexcharts.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/autoComplete.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/Chart.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/daterangepicker.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/drawer.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/dynamicBadge.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/dynamicCheckbox.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/footable.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/fullcalendar@5.2.0.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/google-chart.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery.countdown.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery.filterizr.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery.peity.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/jquery.star-rating-svg.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/leaflet.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/leaflet.markercluster.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/loader.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/message.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/moment.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/muuri.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/notification.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/popover.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/select2.full.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/slick.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/trumbowyg.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/wickedpicker.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/apexmain.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/charts.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/drag-drop.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/footable.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/full-calendar.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/googlemap-init.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/icon-loader.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/jvectormap-init.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/leaflet-init.js') }}"></script>

<script src="{{ asset('dashboard/assets/vendor_assets/js/toastr.min.js') }}"></script>

<script src="{{ asset('dashboard/assets/theme_assets/js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $("#ChangePassword").click(function() {
        $("#changePass").modal('show');
    })
</script>
<script>
    $('#changePass form').on('submit', function(event) {
        event.preventDefault();
        var formData = {
            password: $('#new-password').val(),
            _token: '{{ csrf_token() }}'
        };
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                $("#changePass").modal('hide');
                console.log(response);
            }
        });
    });
</script>
@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>
@endif