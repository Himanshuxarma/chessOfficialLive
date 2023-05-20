<!DOCTYPE html>
<html lang="en">
@include('front.layouts.dashboardHead')

<body>

  <!-- ======= Header ======= -->
  @include('front.layouts.dashboardHeader')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('front.layouts.dashboardSlidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">
  @yield('content')
</main>
<!-- End #main -->

@include('front.layouts.dashboardFoot')

</body>

</html>