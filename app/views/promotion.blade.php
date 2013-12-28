@extends('layout2')

@section('content')

  <div class="row" style="max-width: none;">
    <div class="large-2 columns">
      <ul class="side-nav">
        <li class="heading">Promotion & Coupon</li>
        <li><a href="#">All</a></li>
        <li><a href="#">Promotion</a></li>
        <li><a href="#">Coupon</a></li>
      </ul>
    </div>
    <div class="large-10 columns" style="margin-top: 20px;">

      <!-- First Row -->

      <div class="row">
        <div class="large-6 columns">
          <!-- only for styling -->
        </div>
        <div class="large-6 columns">
          <div class="row">
            <div class="large-4 columns">
              <a href="#" data-reveal-id="chooseKindModal" class="button small expand">Add</a>
            </div>
            <div class="large-8 columns">
              <form action="#" method="GET">
                <div class="row collapse">
                  <div class="small-8 medium-8 columns">
                    <input type="text" name="search" placeholder="Search">
                  </div>
                  <div class="small-4 medium-4 columns">
                    <input type="submit" class="small button alert expand" value="Search">
                  </div>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
        <!-- End First Row -->

        <!-- Second Row -->

        <div class="row">
          <div class="large-12 columns">
            <table>
              <thead>
                <tr>
                  <th>Topics</th>
                  <th>Kind</th>
                  <th>Date Modified</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $bodyTable ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- End Second Row -->

      </div>
    </div>
  </div>

  <!-- choose kind promotion or coupon -->
  <div id="chooseKindModal" class="reveal-modal" data-reveal>
    <h2>Add a deal</h2>
    <p class="lead">What kind of your deal?</p>
    <p>
      <div class="row">
        <div class="large-2 columns">
          <a href="#" data-reveal-id="addModalPromotion" class="secondary button radius">Promotion</a>
        </div>
        <div class="large-1 columns"></div>
        <div class="large-2 columns">
          <a href="#" data-reveal-id="addModalCoupon" class="secondary button radius">Coupon</a>
        </div>
        <div class="large-7 columns"></div>
      </div>
    </p>
  </div>
  <!-- end choose kind promotion or coupon -->

  <!-- modal add Promotion -->
              <div id="addModalPromotion" class="reveal-modal" data-reveal>
                <h2>Add a promotion</h2>
                <p>
                  <form id="addPromotionForm" action="/promotion/insertPromotion" method="POST">
                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Topic</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="text" name="topicPromotion" id="topicPromotion" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Start Date</label>
                      </div>
                      <div class="large-4 columns">
                        <input type="date" name="startDatePromotion" id="startDatePromotion" required='required'>
                      </div>

                      <div class="large-2 columns">
                        <label class="right inline">End date</label>
                      </div>
                      <div class="large-4 columns">
                        <input type="date" name="endDatePromotion" id="endDatePromotion" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Place</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="text" name="placePromotion" id="placePromotion" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Images</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="file" name="imagesPromotion" id="imagesPromotion">
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Description</label>
                      </div>
                      <div class="large-10 columns">
                        <textarea type="text" name="descriptionPromotion" id="descriptionTextField" required='required'></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-10 columns">
                        <a href="#" data-reveal-id="previewPromotionModal" onclick="previewPromotionFunction()" class="secondary button radius">Preview</a>
                      </div>
                      <div class="large-2 columns">
                        <input type="submit" class="small button radius" value="Submit">
                      </div>
                    </div>

                  </form>
                </p>
                <a class="close-reveal-modal">&#215;</a>
              </div>
              <!-- end modal add Promotion -->

                <!-- modal add Coupon -->
              <div id="addModalCoupon" class="reveal-modal" data-reveal>
                <h2>Add a coupon</h2>
                <p>
                  <form id="addCouponForm" action="/promotion/insertCoupon" method="POST">
                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Topic</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="text" name="topicCoupon" id="topicCoupon" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Start Date</label>
                      </div>
                      <div class="large-4 columns">
                        <input type="date" name="startDateCoupon" id="startDateCoupon" required='required'>
                      </div>

                      <div class="large-2 columns">
                        <label class="right inline">End date</label>
                      </div>
                      <div class="large-4 columns">
                        <input type="date" name="endDateCoupon" id="endDateCoupon" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Place</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="text" name="placeCoupon" id="placeCoupon" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Images</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="file" name="imagesCoupon" id="imagesCoupon">
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Number of coupon</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="number" name="numberOfCouponCoupon" id="numberOfCouponCoupon" min="1">
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Description</label>
                      </div>
                      <div class="large-10 columns">
                        <textarea type="text" name="descriptionCoupon" id="descriptionCoupon" required='required'></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-10 columns">
                        <a href="#" data-reveal-id="previewCouponModal" onclick="previewCouponFunction()" class="secondary button radius">Preview</a>
                      </div>
                      <div class="large-2 columns">
                        <input type="submit" class="small button radius" value="Submit">
                      </div>
                    </div>

                  </form>
                </p>
                <a class="close-reveal-modal">&#215;</a>
              </div>
              <!-- end modal add Coupon -->

              <!-- modal edit Promotion -->
              <!-- **************** not implemented yet ****************8 -->
              <div id="editModalPromotion" class="reveal-modal" data-reveal>
                <h2>Edit a promotion</h2>
                <p>
                  <form id="EditCouponForm" action="/promotion/editPromotion" method="POST">
                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Topic</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="text" name="editTopicPromotion" id="editTopicPromotion" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Start Date</label>
                      </div>
                      <div class="large-4 columns">
                        <input type="date" name="editStartDatePromotion" id="editStartDatePromotion" required='required'>
                      </div>

                      <div class="large-2 columns">
                        <label class="right inline">End date</label>
                      </div>
                      <div class="large-4 columns">
                        <input type="date" name="editEndDatePromotion" id="editEndDatePromotion" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Place</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="text" name="editPlacePromotion" id="editPlacePromotion" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Images</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="file" name="editImagesPromotion" id="editImagesPromotion">
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Description</label>
                      </div>
                      <div class="large-10 columns">
                        <textarea type="text" name="editDescriptionPromotion" id="editDescriptionPromotion" required='required'></textarea>
                      </div>
                    </div>
                    <input type="hidden" name="idForEditPromotion" id="idForEditPromotion">
                    <div class="row">
                      <div class="large-10 columns">
                      </div>
                      <div class="large-2 columns">
                        <input type="submit" class="small button radius" value="Submit">
                      </div>
                    </div>
                  </form>
                </p>
                <a class="close-reveal-modal">&#215;</a>
              </div>

              <!-- end modal edit Promotion -->

              <!-- modal edit Coupon -->
              <div id="editModalCoupon" class="reveal-modal" data-reveal>
                <h2>Edit a coupon</h2>
                <p>
                  <form id="EditCouponForm" action="/promotion/editCoupon" method="POST">
                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Topic</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="text" name="editTopicCoupon" id="editTopicCoupon" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Start Date</label>
                      </div>
                      <div class="large-4 columns">
                        <input type="date" name="editStartDateCoupon" id="editStartDateCoupon" required='required'>
                      </div>

                      <div class="large-2 columns">
                        <label class="right inline">End date</label>
                      </div>
                      <div class="large-4 columns">
                        <input type="date" name="editEndDateCoupon" id="editEndDateCoupon" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Place</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="text" name="editPlaceCoupon" id="editPlaceCoupon" required='required'>
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Images</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="file" name="editImagesCoupon" id="editImagesCoupon">
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Number of coupon</label>
                      </div>
                      <div class="large-10 columns">
                        <input type="number" name="editNumberOfCouponCoupon" id="editNumberOfCouponCoupon" min="1">
                      </div>
                    </div>

                    <div class="row">
                      <div class="large-2 columns">
                        <label class="right inline">Description</label>
                      </div>
                      <div class="large-10 columns">
                        <textarea type="text" name="editDescriptionCoupon" id="editDescriptionCoupon" required='required'></textarea>
                      </div>
                    </div>
                    <input type="hidden" name="idForEditCoupon" id="idForEditCoupon">
                    <div class="row">
                      <div class="large-10 columns">
                      </div>
                      <div class="large-2 columns">
                        <input type="submit" class="small button radius" value="Submit">
                      </div>
                    </div>
                  </form>
                </p>
                <a class="close-reveal-modal">&#215;</a>
              </div>
              <!-- end modal edit Coupon -->



              <!-- preview coupon modal -->
              <div id="previewCouponModal" class="reveal-modal" data-reveal>
                <div style="height:568px;width:320px;">
                  <div class="off-canvas-wrap">
                    <div class="inner-wrap">
                      <nav class="tab-bar">
                        <section class="left-small">
                          <a class="left-off-canvas-toggle menu-icon"><span></span></a>
                        </section>

                        <section class="middle tab-bar-section">
                          <h1 class="title">Smart Wallet</h1>
                        </section>
                      </nav>

                      <aside class="left-off-canvas-menu">
                        <ul class="off-canvas-list">
                          <li><label>Smart Wallet</label></li>
                          <li><a href="#">All</a></li>
                          <li><a href="#">Promotion</a></li>
                          <li><a href="#">Coupon</a></li>
                        </ul>
                      </aside>

                      <section class="main-section" style="background-color:#CFCFC4">
                        <!-- content goes here -->
                        <p id="topicPreviewCouponHeader" style="width:320px;">
                        </p>
                        
                      </section>

                      <a class="exit-off-canvas"></a>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="large-3 columns">
                    <a href="#" data-reveal-id="addModalCoupon" class="secondary button radius">Back</a>
                  </div>
                  <div class="large-3 columns">
                    <input type="button" onclick="addCouponSubmit()" class="button radius" value="Submit">
                  </div>
                  <div class="large-6 columns">

                  </div>
                </div>
                <a class="close-reveal-modal">&#215;</a>
              </div>
              <!-- end preview coupon modal -->

              <!-- preview promotion modal -->
              <div id="previewPromotionModal" class="reveal-modal" data-reveal>
                <div style="height:568px;width:320px;">
                  <div class="off-canvas-wrap">
                    <div class="inner-wrap">
                      <nav class="tab-bar">
                        <section class="left-small">
                          <a class="left-off-canvas-toggle menu-icon"><span></span></a>
                        </section>

                        <section class="middle tab-bar-section">
                          <h1 class="title">Smart Wallet</h1>
                        </section>
                      </nav>

                      <aside class="left-off-canvas-menu">
                        <ul class="off-canvas-list">
                          <li><label>Smart Wallet</label></li>
                          <li><a href="#">All</a></li>
                          <li><a href="#">Promotion</a></li>
                          <li><a href="#">Coupon</a></li>
                        </ul>
                      </aside>

                      <section class="main-section" style="background-color:#CFCFC4">
                        <!-- content goes here -->
                        <p id="topicPreviewPromotionHeader" style="width:320px;">
                        </p>
                        
                      </section>

                      <a class="exit-off-canvas"></a>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="large-3 columns">
                    <a href="#" data-reveal-id="addModalPromotion" class="secondary button radius">Back</a>
                  </div>
                  <div class="large-3 columns">
                    <input type="button" onclick="addPromotionSubmit()" class="button radius" value="Submit">
                  </div>
                  <div class="large-6 columns">

                  </div>
                </div>
                <a class="close-reveal-modal">&#215;</a>
              </div>
              <!-- end preview promotion modal -->

              <!-- qr code modal -->
              <div id="qrCodeModal" class="reveal-modal" data-reveal>
                <h2>This is your QR code
                <p>
                  <div class="row">
                    <div class="large-12 columns">
                      <!-- get image from google chart qr code -->
                      <!-- use _id to generate QR code -->
                      <?php 
                        echo '<img style="-webkit-user-select: none" src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&choe=UTF-8&chl=';
                        echo $insertedId;
                        echo '">'
                      ?>     
                    </div>
                  </div>
                </p>
                <a class="close-reveal-modal">&#215;</a>
              </div>
              <!-- end qr code modal -->

              <div id="divInsertFlag" class="hide-for-small-only hide-for-medium-up hide-for-large-up hide-for-xlarge-up hide-for-xxlarge-up">
                <?php echo $insertFlag ?>
              </div>

              <script type="text/javascript">
                function previewCouponFunction() {
                  //debug
                  console.log('prevewCouponFunction() called!')
                  //end debug

                  var topicCoupon = $('#topicCoupon').val();
                  var startDateCoupon = $('#startDateCoupon').val();
                  var endDateCoupon = $('#endDateCoupon').val();
                  var placeCoupon = $('#placeCoupon').val();
                  var imagesCoupon = $('#imagesCoupon').val();
                  var numberOfCouponCoupon = $('#numberOfCouponCoupon').val();
                  var descriptionCoupon = $('#descriptionCoupon').val();

                  var pTopicCouponHeader = document.getElementById('topicPreviewCouponHeader');
                  pTopicCouponHeader.innerHTML = topicCoupon;
                }

                function previewPromotionFunction() {
                  //debug
                  console.log('previewPromotionFunction() called!');
                  //end debug

                  var topicPromotion = $('#topicPromotion').val();
                  var startDatePromotion = $('#startDatePromotion').val();
                  var endDatePromotion = $('#endDatePromotion').val();
                  var placePromotion = $('#placePromotion').val();
                  var imagesPromotion = $('#imagesPromotion').val();
                  var descriptionPromotion = $('#descriptionPromotion').val();

                  var pTopicPromotionHeader = document.getElementById('topicPreviewPromotionHeader');
                  pTopicPromotionHeader.innerHTML = "<h5>" + topicPromotion + "</h5>";
                }

                function addCouponSubmit() {
                  //debug
                  console.log('addCouponSubmit() called!');
                  //end debug

                  var addCouponForm = document.getElementById('addCouponForm');
                  addCouponForm.submit();
                }

                function addPromotionSubmit() {
                  //debug
                  console.log('addPromotionSubmit() called!');
                  //end debug

                  var addPromotionForm = $('#addPromotionForm');
                  addPromotionForm.submit();
                }

                function getDetailAndSendId() {
                  console.log("HELLO");
                  ajaxGetCouponDetail();
                  //send _id
                }

                function ajaxGetCouponDetail(eventButtonValue) {
                  console.log(eventButtonValue);
                  var editDealButtonValue = eventButtonValue;
                  var xhr = new XMLHttpRequest();
                  var urlString = '/promotion/getPromotionOrCouponDetail?editDealButton=' + editDealButtonValue;
                  xhr.open('GET', urlString, true);
                  xhr.onload = function(e) {
                    console.log(xhr.responseText);
                  };
                  xhr.send();
                }

                $('button[name=editDealButton]').on('click', function() {
                  var _id = $(this).val();
                  var urlString = '/promotion/getPromotionOrCouponDetail?editDealButton=' + $(this).val();
                  $.getJSON(urlString, function(result){
                    if(result.kind == 'promotion') {
                      $('#idForEditPromotionr').val(_id);
                      $('#editTopicPromotion').val(result.topic);
                      $('#editStartDatePromotion').val(result.start_date);
                      $('#editEndDatePromotion').val(result.end_date);
                      $('#editPlacePromotion').val(result.place);
                      $('#editDescriptionPromotion').val(result.description);

                      $('#editModalPromotion').foundation('reveal', 'open', '#');
                    } else {
                      $('#idForEditCoupon').val(_id);
                      document.getElementById('editTopicCoupon').value = result.topic;
                      document.getElementById('editStartDateCoupon').value = result.start_date;
                      document.getElementById('editEndDateCoupon').value = result.end_date;
                      document.getElementById('editPlaceCoupon').value = result.place;
                      //document.getElementById('editImagesCoupon').value = result.images;
                      document.getElementById('editNumberOfCouponCoupon').value = result.number_of_coupon;
                      document.getElementById('editDescriptionCoupon').value = result.description;
                      $('#editModalCoupon').foundation('reveal', 'open', '#');
                    }
                  });
                });
              </script>
@stop