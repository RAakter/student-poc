<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Repository;

class CommentRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Comment::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->firstOrCreate($data);
    }


}

