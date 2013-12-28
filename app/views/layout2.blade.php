<!DOCTYPE HTML>
<html>
  <head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Index Foundation</title>
  	{{HTML::style('foundation_css/css/normalize.css')}}
  	{{HTML::style('foundation_css/css/foundation.min.css')}}
    {{HTML::script('foundation_css/js/jquery.js')}}
  	{{HTML::script('foundation_css/js/modernizr.js')}}

    {{HTML::script('css/index2.css')}}
    <style type="text/css">
    #topicPreviewPromotionHeader {
      overflow-wrap: break-word;
    }

    #topicPreviewCouponHeader {
      overflow-wrap: break-word;
    }
    </style>
  </head>
  <body>
  <!-- topbar -->
  <div class="fixed">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="#">Smart Wallet</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
        <ul class="left">
          <li><a href="#">Promotion & Coupon</a></li>
          <li><a href="#">Statistic</a></li>
        </ul>

        <ul class="right">
          <li class="active"><a href="#">Sign in</a></li>
        </ul>
      </section>
    </nav>
  </div>
  <!-- End topbar-->

  @yield('content')
  	{{HTML::script('foundation_css/js/foundation.min.js')}}
  	<script>
  	  $(document).foundation();
      function checkInsertFlag() {
                  var insertFlag = document.getElementById('divInsertFlag').innerHTML;
                  if (insertFlag == true) {
                    $('#qrCodeModal').foundation('reveal', 'open', '#');
                  }
      }
      checkInsertFlag();
  	</script>
  </body>
</html>
