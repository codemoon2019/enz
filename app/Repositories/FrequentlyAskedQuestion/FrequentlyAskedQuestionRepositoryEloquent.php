<?php

namespace App\Repositories\FrequentlyAskedQuestion;

use App\Models\FrequentlyAskedQuestion\FrequentlyAskedQuestion;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class FrequentlyAskedQuestionRepositoryEloquent
 *
 * @package App\Repositories\FrequentlyAskedQuestion
 */
class FrequentlyAskedQuestionRepositoryEloquent extends BaseRepository implements FrequentlyAskedQuestionRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new FrequentlyAskedQuestionObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FrequentlyAskedQuestion::class;
    }
}
