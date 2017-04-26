<?php

class IndexController extends ControllerBase
{
    private $languages = ['ee', 'en', 'ru', 'fi'];

    public function indexAction()
    {

die('b');
//        // Food data import
//        try {
//            $this->db->begin();
//
//            // Kitchen
//            $kitchensMap = [];
//            $kitchens = JoomlaRestaurantCategorys::find();
//            foreach ($kitchens as $kitchen) {
//                if (!$foKitchen = Kitchen::findFirstByName($kitchen->name)) {
//                    $foKitchen = $this->createKitchen($kitchen);
//                }
//                $kitchensMap[$kitchen->id] = $foKitchen->id ;
//            }
//
//            // Place
//            $restaurants = JoomlaRestaurant::find(["order" => "restaurant_name",]);
//            $parentChildRestraurants = [];
//            $parentNameIds = [];
//            foreach ($restaurants as $restaurant) {
//                if ( strpos($restaurant->restaurant_name, ' (')) {
//                    $parentName = substr($restaurant->restaurant_name, 0, strpos($restaurant->restaurant_name, ' ('));
//                    if (array_key_exists($parentName, $parentNameIds)) {
//                        if ($parentNameIds[$parentName] != $restaurant->id) {
//                            $parentChildRestraurants[$parentNameIds[$parentName]][] = $restaurant->id;
//                        }
//                        continue;
//                    }
//                    $parent = JoomlaRestaurant::findFirst(["restaurant_name LIKE '" . $parentName ."%' AND restaurant_name != '" . $restaurant->restaurant_name . "'"]);
//                    if ($parent) {
//                        $parentNameIds[$parentName] = $parent->id;
//                        if ($parent->id != $restaurant->id) {
//                            $parentChildRestraurants[$parent->id][] = $restaurant->id;
//                        }
//                    } else {
//                        $parentChildRestraurants[$restaurant->id] = array();
//                        $parentNameIds[$parentName] = $restaurant->id;
//                    }
//                } else {
//                    $parentChildRestraurants[$restaurant->id] = array();
//                }
//            }
//
//            foreach ($parentChildRestraurants as $restaurantId => $childs) {
//                $restaurant = JoomlaRestaurant::findFirstById($restaurantId);
//                $place = $this->createPlace($restaurant);
//
//                // Place kitchens
//                foreach (JoomlaRestaurantCategoryXhref::find(["restarauntid = '" . $restaurant->id . "'"]) as $restaurantCategory) {
//                    $foRestaurantCategory = new PlaceKitchen();
//                    $foRestaurantCategory->place_id = $place->getId();
//                    $foRestaurantCategory->kitchen_id = $kitchensMap[$restaurantCategory->catid];
//                    $foRestaurantCategory->create();
//                }
//
//                $this->createPlacePoint($place, $restaurant);
//
//                foreach ($childs as $child) {
//                    $restaurantChild = JoomlaRestaurant::findFirstById($child);
//                    $this->createPlacePoint($place, $restaurantChild);
//                }
//
//                // Place dish category
//                // create standart categories
//                $foFoodCategoryMap = [];
//                $tmpCategoryNames = [];
//                $foFoodCategoryUnitMap = [];
//                foreach (JoomlaFoodCategorys::find() as $category) {
//                    $foFoodCategory = $this->createFoodCategory($category, $place);
//                    $foFoodCategoryMap[$category->getId()] = $foFoodCategory->getId();
//                    $tmpCategoryNames[] = strtolower($category->name);
//
//                    $foDishUnitsCategories = $this->createDishUnitCategory($category, $place);
//                    $foDishUnit = $this->createDishUnit($foDishUnitsCategories, $place);
//                    $foFoodCategoryUnitMap[$category->getId()] = $foDishUnit->getId();
//                }
//                foreach (JoomlaRestaurantUserCategorys::find(["restaurant_id = '" . $restaurant->id . "'"]) as $category) {
//                    if (!isset($foFoodCategoryMap[$category->getId()]) && !in_array(strtolower($category->name), $tmpCategoryNames)) {
//                        $foFoodCategory = $this->createFoodCategory($category, $place);
//                        $foFoodCategoryMap[$category->getId()] = $foFoodCategory->getId();
//                        $tmpCategoryNames[] = strtolower($category->name);
//
//                        $foDishUnitsCategories = $this->createDishUnitCategory($category, $place);
//                        $foDishUnit = $this->createDishUnit($foDishUnitsCategories, $place);
//                        $foFoodCategoryUnitMap[$category->getId()] = $foDishUnit->getId();
//                    }
//                }
//
//                // Create dishes
//                $foDishOptions = [];
//                foreach (JoomlaFoods::find(["restaurant_id = '" . $restaurant->id . "'"]) as $dish) {
//                    $foDish = new Dish();
//                    $foDish->name = substr($dish->food_name, 0, 80);
//                    $foDish->place_id = $place->getId();
//                    $foDish->created_at = date('Y-m-d');
//                    $foDish->recomended = 0;
//                    $foDish->description = ($dish->food_description ? : " ");
//                    $foDish->active = $dish->food_active;
//                    $foDish->check_even_odd_week = 0;
//                    $foDish->even_week = 0;
//                    $foDish->use_date_interval = 0;
//                    $foDish->photo = ($dish->food_thumbnail ? : 'nologo.png');
//                    $foDish->create();
//
//                    if (!empty($dish->food_category) && isset($foFoodCategoryMap[$dish->food_category])) {
//                        $foCategoryDishMap = new FoodCategoryDishMap();
//                        $foCategoryDishMap->dish_id = $foDish->getId();
//                        $foCategoryDishMap->foodcategory_id = $foFoodCategoryMap[$dish->food_category];
//                        $foCategoryDishMap->create();
//
//                        $this->createDishSize($foDish, $foFoodCategoryUnitMap[$dish->food_category], $dish->food_price);
//                    }
//
//                    foreach (JoomlaFoodUserExtrasAttached::find(["food_id = '" . $dish->getId() . "'"]) as $foodUserExtrasAttached) {
//                        $foodUserExtras = JoomlaFoodUserExtras::findById($foodUserExtrasAttached->extra_id);
//                        foreach ($foodUserExtras as $foodUserExtra) {
//                            if (!in_array($foodUserExtra->getId(), $foDishOptions)) {
//                                $foDishOption = new DishOption();
//                                $foDishOption->name = substr($foodUserExtra->name_original, 0, 60);
//                                $foDishOption->place_id = $place->getId();
//                                $foDishOption->price = $foodUserExtra->pricevalue;
//                                $foDishOption->hidden = 0;
//                                $foDishOption->created_at = date('Y-m-d');
//                                $foDishOption->single_select = 0;
//                                $foDishOption->create();
//                                $foDishOptions[$foodUserExtra->getId()] = $foDishOption->getId();
//                                $tmpDishOptionId = $foDishOption->getId();
//                            } else {
//                                $tmpDishOptionId = $foDishOptions[$foodUserExtra->getId()];
//                            }
//
//                            $foDishOptionMap = new DishOptionMap();
//                            $foDishOptionMap->dish_id = $foDish->getId();
//                            $foDishOptionMap->dishoption_id = $tmpDishOptionId;
//                            $foDishOptionMap->create();
//                        }
//                    }
//                }
//            }
//
//            $this->db->commit();
//        } catch (Exception $e) {
//            $this->logger->error($e->getMessage());
//            $this->logger->debug($e->getTraceAsString());
//            $this->db->rollback();
//        }
//        exit;
    }

    private function createSlug($itemId, $type, $text, $text2 = null)
    {

        foreach ($this->languages as $language) {
            $slug = new CommonSlug();
            $slug->item_id = $itemId;
            $slug->lang_id = $language;
            $slug->type = $type;
            if (!empty($text2)) {
                $slug->orig_name = $this->prepareStringForSlug($text) . '/' . $this->prepareStringForSlug($text2);
                $slug->name = $this->prepareStringForSlug($text) . '/' . $this->prepareStringForSlug($text2);
            } else {
                $slug->orig_name = $this->prepareStringForSlug($text);
                $slug->name = $this->prepareStringForSlug($text);
            }
            $slug->is_active = 1;
            $slug->create();
        }
    }

    private function prepareStringForSlug($text)
    {
        $countryCharReplacements = array(
            'lt' => array(
                'ą' => 'a',
                'č' => 'c',
                'ę' => 'e',
                'ė' => 'e',
                'į' => 'i',
                'š' => 's',
                'ų' => 'u',
                'ū' => 'u',
                'ž' => 'z',
            ),
            'en' => array(),
            'ru' => array(
                'ґ'=>'g','ё'=>'e','є'=>'e','ї'=>'i','і'=>'i',
                'а'=>'a', 'б'=>'b', 'в'=>'v',
                'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'e',
                'ж'=>'zh', 'з'=>'z', 'и'=>'i', 'й'=>'i',
                'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n',
                'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s',
                'т'=>'t', 'у'=>'u', 'ф'=>'f', 'х'=>'h',
                'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sch',
                'ы'=>'y', 'э'=>'e', 'ю'=>'u', 'я'=>'ya', 'é'=>'e',
                'ь'=>'', 'ъ' => '',
            ),
            'lv' => array ( /* Latvian */
                'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
                'š' => 's', 'ū' => 'u', 'ž' => 'z', 'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i',
                'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z'
            ),
            'ee' => array (
                'Š' => 'S', 'Ž' => 'Z', 'Õ' => 'O', 'Ä' => 'A', 'Ö' => 'O', 'Ü' => 'U',
                'š' => 's', 'ž' => 'z', 'õ' => 'o', 'ä' => 'a', 'ö' => 'o', 'ü' => 'u'
            )
        );

        $removableChars = array(
            '"' => '',
            '„' => '',
            '“' => '',
            '+' => '-',
            '(' => '',
            ')' => '',
            '.' => '',
            '!' => '',
            '?' => '',
            ',' => '',
            '*' => '',
            '%' => '',
            '#' => '',
            '{' => '',
            '}' => '',
            '|' => '',
            '<' => '',
            '>' => '',
            "\\" => '',
            '/' => '',
            '^' => '',
            '~' => '',
            '[' => '',
            ']' => '',
            '`' => '',
            '´' => '',
            "'" => '',
            ';' => '',
            ':' => '',
            '=' => '-',
            '@' => '',
            '$' => '',
            '&' => '',
            'ø' => '',
            'Ø' => '',
            'â€”' => '',
            'â€“' => '',
        );

        $text = strtr($text, $removableChars);
        $text = preg_replace('#\s+#u', '-', $text);
        $text = preg_replace('~-{2,}~', '-', $text);
        $text = strtr(mb_strtolower($text, 'utf-8'), $countryCharReplacements['ee']);
        $text = strtr(mb_strtolower($text, 'utf-8'), $countryCharReplacements['ru']);
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

        return $text;
    }

    private function createKitchen($kitchen)
    {
        $foKitchen = new Kitchen();
        $foKitchen->visible = 1;
        $foKitchen->name = $kitchen->name;
        $foKitchen->alias = $kitchen->name_nice;
        $foKitchen->created_at = date('Y-m-d');
        $foKitchen->created_by = 1;
        $foKitchen->create();

        $this->createSlug($foKitchen->id, 'kitchen', $foKitchen->name);
        return $foKitchen;
    }

    private function createFoodCategory($category, $place)
    {
        $foFoodCategory = new FoodCategory();
        $foFoodCategory->active = 1;
        $foFoodCategory->name = substr($category->name, 0, 45);
        $foFoodCategory->created_at = date('Y-m-d');
        $foFoodCategory->alcohol = 0;
        $foFoodCategory->drinks = 0;
        $foFoodCategory->place_id = $place->id;
        $foFoodCategory->create();
        //echo 'P'.$place->id . ' - F' . $category->id . ' ' . $place->name . ' :: ' . $category->name. "\n\r";
        $this->createSlug($foFoodCategory->id, 'food_category', $place->name, $category->name);
        return $foFoodCategory;
    }

    private function createDishUnitCategory($category, $place)
    {
        $foDishUnitsCategories = new DishUnitsCategories();
        $foDishUnitsCategories->name = substr($category->name, 0, 45);
        $foDishUnitsCategories->place = $place->id;
        $foDishUnitsCategories->created_at = date('Y-m-d');
        $foDishUnitsCategories->created_by = 1;

        return $foDishUnitsCategories;
    }

    private function createDishUnit($foDishUnitsCategories, $place)
    {
        $foDishUnit = new DishUnit();
        $foDishUnit->place = $place->id;
        $foDishUnit->name = 'osa';
        $foDishUnit->unitCategory = $foDishUnitsCategories->id;

        $foDishUnit->created_at = date('Y-m-d');
        $foDishUnit->created_by = 1;

        return $foDishUnit;
    }

    private function createDishSize($dish, $unitId, $price)
    {
        $foDishSize = new DishSize();
        $foDishSize->dish_id = $dish->id;
        $foDishSize->unit_id = $unitId;
        $foDishSize->price = $price;
        $foDishSize->created_at = date('Y-m-d');
        $foDishSize->create();

        return $foDishSize;
    }

    private function createPlace($restaurant)
    {
        $place = new Place();
        $place->active = $restaurant->restaurant_active;
        $place->name = $restaurant->restaurant_name;
        $place->logo = ($restaurant->restaurant_logo ? : 'nologo.png');
        $place->created_at = date('Y-m-d');
        $place->created_by = 1;
        $place->recommended = 0;
        $place->new = 0;
        $place->description = $restaurant->restaurant_description;
        $place->delivery_price = 0;
        $place->delivery_time = '60 min';
        $place->pickup_time = '30 min';
        $place->cart_minimum = 0;
        $place->self_delivery = 0;
        $place->average_rating = 0;
        $place->min_on_self = 0;
        $place->card_on_delivery = 0;
        $place->disabled_online_payment = 1;
        $place->navision = 0;
        $place->delivery_options = 'delivery';
        $place->only_alcohol = 0;
        $place->send_invoice = 0;
        $place->review_count = 0;
        $place->create();

        $this->createSlug($place->id, 'place', $place->name);
        return $place;
    }

    private function createPlacePoint($place, $restaurant)
    {
        // Placepoint
        // Create slef placepoint
        $placepoint = new PlacePoint();
        $placepoint->active = 1;
        $placepoint->place = $place->getId();
        $placepoint->address = $restaurant->street;
        $placepoint->city = 'Tallinn';
        $placepoint->delivery_time = '60 min';
        $placepoint->pick_up = 1;
        $placepoint->delivery = 1;
        $placepoint->phone = $restaurant->phone;
        $placepoint->fast = 0;
        $placepoint->public = 1;
        $placepoint->allow_card = 0;
        $placepoint->allow_cash = 1;
        $placepoint->company_code = 0;
        $placepoint->use_external_logistics = 0;
        $latlon = $this->getCoordinates($placepoint->address . ', ' . $placepoint->city);
        $placepoint->lat = $latlon[0];
        $placepoint->lon = $latlon[1];

        /*for($i = 1; $i <= 7; $i++) {
            $tmpW = JoomlaRestaurantOpenXhref::find(["restarauntid = '" . $restaurant->id . "' AND akey = '".($i -1)."'"]);
            if (!empty($tmpW->ohour) && !is_null($tmpW->ohour)) {
                $placepoint->wd.$i = $tmpW->ohour . ' - ' . $tmpW->chour;
            } else {
                $placepoint->wd{$i} = '10:00 - 22:00';
            }
        }*/

        $placepoint->wd1 = '09:00 - 22:00';
        $placepoint->wd2 = '09:00 - 22:00';
        $placepoint->wd3 = '09:00 - 22:00';
        $placepoint->wd4 = '09:00 - 22:00';
        $placepoint->wd5 = '09:00 - 22:00';
        $placepoint->wd6 = '09:00 - 22:00';
        $placepoint->wd7 = '09:00 - 22:00';

        $placepoint->created_at = date('Y-m-d');
        $placepoint->create();
    }

    private function getCoordinates($address){
        $address = urlencode($address);
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
        $response = file_get_contents($url);
        $json = json_decode($response,true);

        $lat = $json['results'][0]['geometry']['location']['lat'];
        $lng = $json['results'][0]['geometry']['location']['lng'];

        return array($lat, $lng);
    }
}