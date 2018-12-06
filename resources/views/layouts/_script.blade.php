<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }} "></script>
<script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }} "></script>
<script src="{{ asset('assets/js/off-canvas.js') }} "></script>
<script src="{{ asset('assets/js/misc.js') }} "></script>
<script src="{{ asset('assets/js/dashboard.js') }} "></script>
<script src="{{ asset('assets/plugin/izitoast/dist/js/iziToast.min.js') }} "></script>
<script src="{{ asset('assets/plugin/select2/dist/js/select2.min.js') }} "></script>
<script src="{{ asset('assets/Login_v1/vendor/tilt/tilt.jquery.min.js') }} "></script>
<script src="{{ asset('assets/plugin/scrollbar/jquery.custom-scrollbar.js') }} "></script>
<script src="{{ asset('assets/plugin/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/plugin/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script type="text/javascript">
"use strict";

$(document).ready(function domReady() {
    $(".select2").select2({
        placeholder: "Cari Menu",
       	width: '100%' 

    });

    $('.js-tilt').tilt({
        scale: 1.1
    })


	$(".chat-body").customScrollbar({
		hScroll:false,
	});
	
	$(".chat-body").customScrollbar("scrollToY", 999999999999999)
	$(".chat-body").customScrollbar("setAnimationSpeed", 200)
 });

function minimize() {
	$('.chat').addClass('trans');
}

function maximize() {
	$('.chat').removeClass('trans');
}

$('.wajib').focus(function(){
	$(this).removeClass('error');
})

</script>