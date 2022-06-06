

		<!-- Header -->
		@include('layouts.header')
			
		<!-- Main -->
		<div class="wrapper style1">

			<div class="container">
				<div class="row gtr-200">
					<div class="col-4 col-12-mobile" id="sidebar">
					@yield('sidebar')
					</div>
					<div class="col-8 col-12-mobile imp-mobile" id="content">
					@yield('content')
					</div>
				</div>
			</div>

		</div>

		<!-- Footer -->
		@include('layouts.footer')	

	</div>
</body>
</html>