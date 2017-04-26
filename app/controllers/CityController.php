<?php

class CityController extends ControllerBase
{

    public function indexAction()
    {


        $cityCollection = $this->getDI()->get('config')->params->available_cities;

        foreach ($cityCollection as $city)
        {
            //DO SMTH
        }

        var_dump($cityCollection);die();
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