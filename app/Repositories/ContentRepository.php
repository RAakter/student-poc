<?php


namespace App\Repositories;


use App\Models\Content;

class ContentRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Content::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param       $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }


}
