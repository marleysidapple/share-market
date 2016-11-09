<!-- START X-NAVIGATION VERTICAL -->
<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
  @include('shared.header')
</ul>
<!-- END X-NAVIGATION VERTICAL -->
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <!-- <li><a href="index.html#">Home</a></li> -->
    <li>Home</li>
    @if(isset($subTabId))
      <li class=""><a href="{{URL::to('management/'.$tabId)}}">Management</a></li>
      <li class=""><a href="{{URL::to('management/'.$tabId)}}">{{ucfirst($tabId)}}</a></li>
      <li class="active"><a href="">{{ucfirst($subTabId)}}</a></li>
    @elseif(isset($tabId))
     <li class=""><a href="{{URL::to('management/'.$tabId)}}">Management</a></li>
      <li class="active"><a href="">{{ucfirst($tabId)}}</a></li>
    @else
    <li class="active"><a href="">{{ucfirst(\Request::route()->getName())}}</a></li>
	  @endif
</ul>
<!-- END BREADCRUMB -->
