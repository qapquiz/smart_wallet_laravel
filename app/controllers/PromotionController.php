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
  	$_id = $_REQUEST['editDealButton'];

  }

  public function editCoupon() {
  	$_id = $_REQUEST['editDealButton'];
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
                                "<input type='hidden' name='editDealButton' id='editDealButton' value='" .
                                $item->_id .
                                "'>" .
                                "<input type='submit' class='button small' value='Edit'>" .
                                "</form>" .
                                "</td>" .
                                "<td>" .
                                "<form action='promotion/deletePromotionOrCoupon' method='post'>" .
                                "<input type='hidden' name='deleteDealButton' id='deleteDealButton' value='" .
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
