<?php


namespace App\Services;

use App\Http\Requests\StoreContentRequest;
use App\Repositories\ContentRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use File;

class ContentService
{
    /**
     * @var ContentRepository
     */
    private $contentRepository;
    /**
     * @var FileUploadService
     */
    private $fileUploadService;

    /**
     * CourseCategoryService constructor.
     * @param ContentRepository $contentRepository
     * @param FileUploadService $fileUploadService
     */
    public function __construct(ContentRepository     $contentRepository,
                                FileUploadService     $fileUploadService
    )
    {
        $this->contentRepository = $contentRepository;
        $this->fileUploadService = $fileUploadService;
    }

    public function createContent(StoreContentRequest $request)
    {
        try {
            $content_data = $request->only('description');
            $content_data['created_by'] = Auth::user()->id;
            $content = $this->contentRepository->create($content_data);

            if ($request->hasFile('video')) {
                $content->video = $this->contentVideo($request) ?? null;
            }
            $content->save();
            return $content;
        } catch (ModelNotFoundException $e) {
            \Log::error('Content not found');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
        return false;
    }


    public function contentVideo($input)
    {
        $data['file'] = $input->file('video');
        $data['file_name'] = 'file_name_' . "_" . date('Y_m_d_h_i_s');
        $data['destination'] = 'upload/files/video/';
        $c_file = $this->fileUploadService->saveFiles($data);
        return $c_file;
    }

}
