<?php

namespace App\Repositories\Core\Setting;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Criterion\Eloquent\ThisHasCurrentDomainCriteria;
use App\Models\Core\Setting;
use App\Repositories\Core\Domain\DomainRepository;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class SettingRepositoryEloquent
 *
 * @package App\Repositories\Core\Setting
 */
class SettingRepositoryEloquent extends BaseRepository implements SettingRepository
{
    /**
     * @param array $data
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function updateMultiple(array $data)
    {
        foreach ($data as $machineName => $value) {

            if (empty($value)) {
                $value = '';
            }

            $this->pushCriteria(new ThisHasCurrentDomainCriteria(app('request')->get('domain-name')));
            $model = $this->findWhere([
                'machine_name' => $machineName,
            ])->first();

            if (empty($model)) {
                continue;
            }

            if ($model->machine_name == 'site-title') {
                $domainRepo = app(DomainRepository::class);
                $domainRepo->pushCriteria(
                    new ThisEqualThatCriteria('machine_name', app('request')->get('domain-name'))
                );
                $domain = $domainRepo->all()->first();
                if (empty($domain)) {
                    continue;
                }
                $domainRepo->update([
                    'title' => $value,
                ], $domain->id);
                return;
            }

            if ($model->type == 'file') {
                $model
                    ->addMedia($value)
                    ->toMediaCollection($model->collection_name);
                $value = $model->getFirstMediaUrl($model->collection_name, 'default');
            }

            $this->update([
                'value' => $value,
            ], $model->id);

        }
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Setting::class;
    }
}
