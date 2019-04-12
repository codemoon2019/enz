<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/4/18
 * Time: 8:32 AM
 */

namespace Tests\Feature\Backend\Core\Category;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->loginAsSystem();
        $this->get(route('admin.categories.index'))
            ->assertStatus(200);
    }
}