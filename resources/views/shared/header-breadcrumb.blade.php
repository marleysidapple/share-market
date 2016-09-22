<!-- START X-NAVIGATION VERTICAL -->
<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
  @include('shared.header')
</ul>
<!-- END X-NAVIGATION VERTICAL -->

  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <!-- <li><a href="index.html#">Home</a></li> -->
      <li>Home</li>
      <li class="active"><a href="{{route(\Request::route()->getName())}}">{{ucfirst(\Request::route()->getName())}}</a></li>
  </ul>
  <!-- END BREADCRUMB -->
