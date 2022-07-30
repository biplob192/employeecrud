<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{url('/dashboard')}}">
				<img src="{{asset('Backend')}}/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="{{asset('Backend')}}/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">

					<li>
						<a href="{{url('/dashboard')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Daily Ads</span>
						</a>
						<ul class="submenu">
							<li><a href="{{url('/ad')}}">Add New</a></li>
							<li><a href="{{url('/ads')}}">All Ads</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-analytics-4"></span><span class="mtext">Reports</span>
						</a>
						<ul class="submenu">
							<li><a href="{{url('/daily_ads_report')}}">Daily Ads Report</a></li>
							<li><a href="{{url('/correspondent_report')}}">Correspondent Report</a></li>
						</ul>
					</li>
					@role('super_admin|admin|editor')
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-money-2"></span><span class="mtext">Payments</span>
						</a>
						<ul class="submenu">
							<li><a href="{{url('/cheque')}}">New Cheque</a></li>
							<li><a href="{{url('/cheques')}}">All Cheque</a></li>
							<li><a href="{{url('/commissions')}}">Commission</a></li>
						</ul>
					</li>
					@endrole

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user1"></span><span class="mtext">Correspondents</span>
						</a>
						<ul class="submenu">
							<li><a href="{{url('/correspondent')}}">Add New</a></li>
							<li><a href="{{url('/correspondents')}}">All Correspondent</a></li>
							@hasrole('super_admin|admin|editor')
							<li><a href="{{url('/corrwallets')}}">Correspondent Wallet</a></li>
							@endhasrole
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon fa fa-plug"></span><span class="mtext">Division List</span>
								</a>
								<ul class="submenu child">
									<li><a href="javascript:;">Barisal</a></li>
									<li><a href="javascript:;">Chattogram</a></li>
									<li><a href="javascript:;">Dhaka</a></li>
									<li><a href="javascript:;">Khulna</a></li>
									<li><a href="javascript:;">Mymensingh</a></li>
									<li><a href="javascript:;">Rajshahi</a></li>
									<li><a href="javascript:;">Rangpur</a></li>
									<li><a href="javascript:;">Sylhet</a></li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-briefcase"></span><span class="mtext">Office Staff</span>
						</a>
						<ul class="submenu">
							@hasanyrole('super_admin|admin|editor')
							<li><a href="{{url('employee')}}">Add New</a></li>
							@endhasanyrole
							<li><a href="{{url('employees')}}">All Staff</a></li>
						</ul>
					</li>
					@hasanyrole('super_admin|admin|editor')
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
						</a>
						<ul class="submenu">
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon fa fa-plug"></span><span class="mtext">Ad Setting</span>
								</a>
								<ul class="submenu child">
									<li><a href="{{url('/ad_prices')}}">All Ads Price</a></li>
									<li><a href="{{url('/ad_price')}}">New Ads Price</a></li>
								</ul>
							</li>

							<li><a href="{{url('/users')}}">User</a></li>

						</ul>
					</li>
					@endhasanyrole

				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
