<?php

use Phalcon\Cli\Task;

class CityTask extends Task
{
    public function mainAction()
    {

        try {
            $this->db->begin();
            $cityCollection = $this->getDI()->get('config')->params->available_cities;
            foreach ($cityCollection as $city) {
                $cityObj = new City();
                $cityObj->title = $city;
                $cityObj->slug = ToolsHelper::generateSlug($city);
                $cityObj->active = 1;
                $cityObj->title = $city;

                $cityObj->create();



                $streetCollection = CityStreets::findByCity($city);
                foreach ($streetCollection as $street) {
                    $street->city_id = $cityObj->id;
                    $street->update();
                }

                $marketingUserCollection = MarketingUsers::findByCity($city);
                foreach ($marketingUserCollection as $marketingUser) {
                    $marketingUser->city_id = $cityObj->id;
                    $marketingUser->update();
                }

                $navCodeCollection = NavCodes::findByCity($city);
                foreach ($navCodeCollection as $navCode) {
                    $navCode->city_id = $cityObj->id;
                    $navCode->update();
                }

                $orderCollection = Orders::findByPlacePointCity($city);
                foreach ($orderCollection as $order) {
                    $order->city_id = $cityObj->id;
                    $order->update();
                }

                $orderAccCollection = OrderAccData::findByCity($city);
                foreach ($orderAccCollection as $orderAccData) {
                    $orderAccData->city_id = $cityObj->id;
                    $orderAccData->update();
                }

                $ppCollection = PlacePoint::findByCity($city);
                foreach ($ppCollection as $pp) {
                    $pp->city_id = $cityObj->id;
                    $pp->update();

                    $place = Place::findFirst($pp->place);
                    $place->city_id = $cityObj->id;
                    $place->update();
                }

                $userAddrCollection = UserAddress::findByCity($city);
                foreach ($userAddrCollection as $userAddr) {
                    $userAddr->city_id = $cityObj->id;
                    $userAddr->update();
                }

                $driverCollection = Drivers::findByCity($city);
                foreach ($driverCollection as $driver) {
                    $driver->city_id = $cityObj->id;
                    $driver->update();
                }
            }

            $this->db->commit();

            echo 'Cities migrated'. PHP_EOL;

        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $this->logger->debug($e->getTraceAsString());
            $this->db->rollback();
            die($e->getMessage());

        }
    }

}