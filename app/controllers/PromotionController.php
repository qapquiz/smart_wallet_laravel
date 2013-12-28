<?php
class PromotionController extends BaseController {

  protected $layout = 'layout2';

  public function showPromotionAndCouponTable() {
    //$promotionAndCoupon = Promotion::all();
    $insertFlag = false;

    $headTable = "<table>" .
                 "<thead>" .
                   "<tr>" .
                     "<th>Topics</th>" .
                     "<th>Kind</th>" .
                     "<th>Date Modified</th>" .
                   "</tr>" .
                 "</thead>" .
                 "<tbody>";

    $bodyTable = $this->createBodyTable();

    //$bodyTable = "";

    /*foreach ($promotionAndCoupon as $item) {
      $bodyTable = $bodyTable . "<tr>" .
                                "<td>" .
                                $item->title .
                                "</td>" .
                                "<td>" .
                                $item->kind .
                                "</td>" .
                                "<td>" .
                                $item->dateModified .
                                "</td>" .
                                "</tr>";
    }*/

    $tailTable = "</tbody>" .
                 "</table>";

    $table = $headTable + $bodyTable + $tailTable;

    return View::make('promotion', array('bodyTable' => $bodyTable,
    									 'insertFlag' => $insertFlag,
    									 'insertedId' => '')
    									);
  }

  public function insertPromotion() {
  	$promotion = new Promotion;
  	$promotion->kind = 'promotion';
  	$promotion->topic = $_REQUEST['topicPromotion'];
  	$promotion->start_date = $_REQUEST['startDatePromotion'];
  	$promotion->end_date = $_REQUEST['endDatePromotion'];
  	$promotion->place = $_REQUEST['placePromotion'];
  	$promotion->images = $_REQUEST['imagesPromotion'];
  	$promotion->description = $_REQUEST['descriptionPromotion'];
  	$promotion->save();

  	return Redirect::to('/promotion');
  }

  public function insertCoupon() {
  	$insertFlag = true;

  	$promotion = new Promotion;
  	$promotion->kind = 'coupon';
  	$promotion->topic = $_REQUEST['topicCoupon'];
  	$promotion->start_date = $_REQUEST['startDateCoupon'];
  	$promotion->end_date = $_REQUEST['endDateCoupon'];
  	$promotion->place = $_REQUEST['placeCoupon'];
  	$promotion->images = $_REQUEST['imagesCoupon'];
  	$promotion->number_of_coupon = $_REQUEST['numberOfCouponCoupon'];
  	$promotion->description = $_REQUEST['descriptionCoupon'];
  	$promotion->save();

  	$insertedId = $promotion->_id;

  	$bodyTable = $this->createBodyTable();

  	return View::make('promotion', array('bodyTable' => $bodyTable,
  										 'insertFlag' => $insertFlag,
  										 'insertedId' => $insertedId)
  										);
  }



  public function getPromotionOrCouponDetail() {
  	$id = $_REQUEST['editDealButton'];
  	$coupon = Promotion::find($id);
  	return $coupon;
  }

  public function deletePromotionOrCoupon() {
  	$_id = $_REQUEST['deleteDealButton'];
  	$deal = Promotion::find($_id);
  	$deal->delete();

  	return Redirect::to('/promotion');
  }

  public function editPromotion() {
  	//How to edit :)
  	//Example
  	//$user = User::find(1);
  	//$user->email = 'john@foo.com';
  	//$user->save();
  	$_id = $_REQUEST['idForEditPromotion'];
  	$topic = $_REQUEST['editTopicPromotion'];
  	$start_date = $_REQUEST['editStartDatePromotion'];
  	$end_date = $_REQUEST['editEndDatePromotion'];
  	$place = $_REQUEST['editPlacePromotion'];
  	$description = $_REQUEST['editDescriptionPromotion'];

  	$promotion = Promotion::find($_id);
  	$promotion->topic = $topic;
  	$promotion->start_date = $start_date;
  	$promotion->end_date = $end_date;
  	$promotion->place = $place;
  	$promotion->description = $description;
  	$promotion->save();
  	return Redirect::to('/promotion');
  }

  public function editCoupon() {
  	/*document.getElementById('editTopicCoupon').value = result.topic;
    document.getElementById('editStartDateCoupon').value = result.start_date;
    document.getElementById('editEndDateCoupon').value = result.end_date;
    document.getElementById('editPlaceCoupon').value = result.place;
    document.getElementById('editImagesCoupon').value = result.images;
    document.getElementById('editNumberOfCouponCoupon').value = result.number_of_coupon;
    document.getElementById('editDescriptionCoupon').value = result.description;*/
  	$_id = $_REQUEST['idForEditCoupon'];
  	$topic = $_REQUEST['editTopicCoupon'];
  	$start_date = $_REQUEST['editStartDateCoupon'];
  	$end_date = $_REQUEST['editEndDateCoupon'];
  	$place = $_REQUEST['editPlaceCoupon'];
  	//for images
  	
  	//end for images
  	$number_of_coupon = $_REQUEST['editNumberOfCouponCoupon'];
  	$description = $_REQUEST['editDescriptionCoupon'];

  	$promotion = Promotion::find($_id);
  	$promotion->topic = $topic;
  	$promotion->start_date = $start_date;
  	$promotion->end_date = $end_date;
  	$promotion->place = $place;
  	/*if(!isset($_REQUEST['editImagesCoupon'])) {
  		$images = $_REQUEST['editImagesCoupon'];
  		$promotion->images = $images;
  	}*/
  	
  	$promotion->number_of_coupon = $number_of_coupon;
  	$promotion->description = $description;
  	$promotion->save();
  	return Redirect::to('/promotion');
  }

  public function createBodyTable() {
  	$promotionAndCoupon = Promotion::all();

  	$bodyTable = "";

    foreach ($promotionAndCoupon as $item) {

      $bodyTable = $bodyTable . "<tr>" .
                                "<td>" .
                                $item->topic .
                                "</td>" .
                                "<td>" .
                                $item->kind .
                                "</td>" .
                                "<td>" .
                                $item->updated_at .
                                "</td>" .
                                "<td>" .
                                "<form>" .
                                "<button type='button' name='editDealButton' class='button small' value='" .
                                $item->_id .
                                "'>" .
                                "Edit" .
                                "</button>" .
                                "</form>" .
                                "</td>" .
                                "<td>" .
                                "<form action='promotion/deletePromotionOrCoupon' method='post'>" .
                                "<input type='hidden' name='deleteDealButton' value='" .
                                $item->_id .
                                "'>" .
                                "<input type='submit' class='button small alert' value='Delete'>" .
                                "</form>" .
                                "</td>" .
                                "</tr>";
    }

    return $bodyTable;
  }
}
?>
