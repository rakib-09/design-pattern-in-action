<?php
/**
 * Created by Anonymous
 * Date: 1/5/20
 * Time: 11:56 pm
 */

interface Campaign {
    public function create();

    public function update();

    public function delete();
}

class Charity implements Campaign{

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}

class Business implements Campaign {

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}

abstract class Fundraising{
    abstract function getFundraisingMethod(): Campaign;

    public function campaignType()
    {
        $campaign = $this->getFundraisingMethod();
        $campaign->create();
        $campaign->update();
        $campaign->delete();
    }
}

class CharityFundraising extends Fundraising {

    function getFundraisingMethod(): Campaign
    {
      return new Charity();
    }
}

class BusinessFundraising extends Fundraising {

    function getFundraisingMethod(): Campaign
    {
        return new Business();
    }
}