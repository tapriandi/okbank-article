<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

<?php /*
@can('manage static contents')
<li class="header">Static Content</li>
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/static-page') }}"><i class="fa fa-dashboard"></i> <span>Static Pages</span></a></li>
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/static-block') }}"><i class="fa fa-dashboard"></i> <span>Static Blocks</span></a></li>
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/static-images') }}"><i class="fa fa-dashboard"></i> <span>Static Images</span></a></li>
@endcan
*/?>

<li class="header">Content</li>
<li><a href="{{ backpack_url('article') }}"><i class="fa fa-dashboard"></i> <span>Articles</span></a></li>
<li><a href="{{ backpack_url('link') }}"><i class="fa fa-dashboard"></i> <span>Link</span></a></li>
<li><a href="{{ backpack_url('ads') }}"><i class="fa fa-dashboard"></i> <span>Ads</span></a></li>
<li><a href="{{ backpack_url('category') }}"><i class="fa fa-dashboard"></i> <span>Category</span></a></li>

<!-- <li class="treeview">
<a href="#"><i class="fa fa-calendar"></i> <span>Attendance</span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
    <li><a href='{{ url(config('backpack.base.route_prefix', 'admin').'/fingerprint?month='.date('m').'&year='.date('Y')) }}'><i class="fa fa-bars"></i> <span>Fingerprints</span></a></li>
</ul>
</li> -->


@can('manage users')
<li class="header">Options</li>
<!-- Users, Roles Permissions -->
<li class="treeview">
<a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
  <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
  <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
  <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
</ul>
</li>
@endcan
