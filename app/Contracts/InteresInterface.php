<?php

namespace App\Contracts;

interface InteresInterface
{

    /**
     * select all article
     *
     * @param
     * @return  gallery
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function getAllPaginate();

    /**
     * Create salon
     *
     * @param array $data
     * @return gallery
     */
    public function getCreate($data);

    /**
     * get one album
     *
     * @param array $id
     * @return response
     */
    public function getOne($id);

    /**
     * delete one Language
     *
     * @param $id
     * @return language
     */
    public function getdelete($id);

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function getUpdate($id,$data);

    /**
     * @param $category_id
     * @return mixed
     */
    public function getPageGallery($category_id);

    /**
     * @return mixed
     */
    public function getRandomInteres();

    /**
     * @return mixed
     */
    public function getLastRow();

    /**
     * @param $id
     * @return mixed
     */
    public function showMoreInterest($id);
}
