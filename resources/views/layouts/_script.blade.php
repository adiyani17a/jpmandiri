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
<script src="{{ asset('assets/plugin/dropify-master/dist/js/dropify.js') }} "></script>
<script src="{{ asset('assets/plugin/datapicker/bootstrap-datepicker.js') }} "/></script>

<script type="text/javascript">
"use strict";
var page = 1;

$(document).ready(function domReady() {
    $(".select2").select2({
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

$('.option').change(function(){
	var par = $(this).parents('td');
	par.find('span').eq(0).removeClass('error');
})

function selectChange() {
  page = 1;
  table_append();
}

function cari() {
  page = 1;
  table_append();
}

$(document).on('click','.direct',function(){
  page = $(this).text();
  table_append();
});

$(document).on('click','.next',function(){
  page = page*1 + 1;
  table_append();
});

$(document).on('click','.previous',function(){
  page = page*1 - 1;

  table_append();
});

function filtering() {
  var table = $('#table_data').DataTable();
  table.ajax.reload(null, false);
}

$(document).on('keypress','.hanya_angka',function (e) {
 //if the letter is not digit then display error and don't type anything
  if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
    //display error message
    return false;
  }
});
</script>