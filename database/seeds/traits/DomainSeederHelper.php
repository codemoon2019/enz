<?php
/**
 * Created by PhpStorm.
 * User: lloric
 * Date: 2/15/19
 * Time: 3:39 PM
 */

use App\Models\Core\Domain\Domain;
use Illuminate\Database\Eloquent\Model;

trait DomainSeederHelper
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $type
     */
    public function seedToDomainables(Model $model, string $type = 'other')
    {
        switch ($type) {
            case 'other';
                $domains = Domain::where('machine_name', '!=', 'main')->get();
                break;
            case 'all';
                $domains = Domain::get();
                break;
            case 'main';
            default:
                $domains = Domain::where('machine_name', 'main')->get();
                break;
        }
        foreach ($domains as $domain) {
            try {
                $model->domains()->save($domain);
            } catch (Exception $exception) {
            }
        }
    }
}