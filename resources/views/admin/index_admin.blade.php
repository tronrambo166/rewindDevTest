
@extends('layout.mainlayout_admin')
@section('content')		
@if(!Session::has('admin'))
 <script>window.location.href = "{{ route('login')}}";</script> @endif
 
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="h2 dash-count">
											<p class="h2">{{$artists->count()}}</p>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Artists</h6>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<p class="h2">{{$users->count()}}</p>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Users</h6>
										
									</div>
								</div>
							</div>
						</div>
						



						
				
					
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
	   @endsection
	  