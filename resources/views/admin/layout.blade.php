<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Dashboard HiShop</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/assets/dist/css/adminlte.min.css')}}">

  <link href="{{ URL::asset('admin/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />

  <link href="{{ URL::asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

  <link id="bsdp-css" rel="stylesheet" href="{{ URL::asset('admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

  
  
</head>
<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">

<div class="wrapper">
<!-- /.navbar -->
@include('admin.partials.sidebar')

<!-- Site wrapper -->
<div class="page-wrapper">
  <!-- Navbar -->
  @include('admin.partials.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('admin.partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/assets/dist/js/demo.js')}}"></script>

<script src="{{ URL::asset('admin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ URL::asset('admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>


<script>
  $('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});

  $(".delete").on("submit",function(){
  return confirm("Apakah Anda yakin ingin menghapusnya?");
  });

    $("a.delete").on("click", function () {
			event.preventDefault();
			var orderId = $(this).attr('order-id');
			if (confirm("Do you want to remove this?")) {
				document.getElementById('delete-form-' + orderId ).submit();
			}
		});
		$(".restore").on("click", function () {
			return confirm("Do you want to restore this?");
		});

    function showHideConfigurableAttributes(){
    var productType = $(".product-type").val();

    if (productType == 'configurable'){
      $(".configurable-attributes").show();
    } else{
      $(".configurable-attributes").hide();
			}
		}

		$(function(){
			showHideConfigurableAttributes();
			$(".product-type").change(function() {
				showHideConfigurableAttributes();
			});
		});

</script>
</body>
</html>