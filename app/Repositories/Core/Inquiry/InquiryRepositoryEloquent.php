<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/3/18
 * Time: 2:08 PM
 */

namespace App\Repositories\Core\Inquiry;

use App\Models\Core\Inquiry;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class InquiryRepositoryEloquent
 *
 * @package App\Repositories\Core\Inquiry
 */
class InquiryRepositoryEloquent extends BaseRepository implements InquiryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Inquiry::class;
    }
}