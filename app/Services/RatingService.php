<?php

namespace App\Services;

use App\Contracts\RatingInterface;
use App\Rating;

class RatingService implements RatingInterface
{

    /**
     * NewsService constructor.
     */
    public function __construct()
    {
        $this->rating = new Rating();
    }

    /**
     * select all Language
     *
     * @param
     * @return  Language
     */
    public function getAll()
    {
        return $this->rating->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->rating->paginate(8);
    }


    /**
     * Create Language
     *
     * @param array $data
     * @return Language
     */
    public function getCreate($data)
    {
        return $this->rating->create($data);
    }

    /**
     * get one Language
     *
     * @param array $id
     * @return Language
     */
    public function getOne($id)
    {
        return $this->rating->find($id);
    }

    /**
     * delete one Language
     *
     * @param $id
     * @return language
     */
    public function getdelete($id)
    {
        return $this->getOne($id)->delete();
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function getUpdate($id,$data)
    {
        return $this->getOne($id)->update($data);
    }

    
}