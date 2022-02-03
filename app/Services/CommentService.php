<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CommentService
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * FaqService constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function storeComment(array $input)
    {
        try {
            return $this->commentRepository->create($input);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    public function updateFaq($input, $id)
    {
        try {
            $Faq = $this->commentRepository->find($id);
            $this->commentRepository->update($input, $id);
            return $Faq;
        } catch (ModelNotFoundException $e) {
            Log::error('Not found');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return false;
    }


    public function commentCreate($input)
    {
        $output['name'] = $input['name'];
        $output['email'] = $input['email'];
        $output['age'] = $input['age'];
        $output['rating'] = $input['rating'];
        $output['comment'] = $input['comment'];
        $output['created_by'] = Auth::id();
        $output['created_at'] = Carbon::now();
        return $this->storeComment($output);
    }

    public function commentUpdate($input, $id)
    {
        $output['status'] = $input['status'];
        $output['updated_by'] = Auth::id();
        $output['updated_at'] = Carbon::now();
        return $this->updateFaq($output, $id);
    }


}
