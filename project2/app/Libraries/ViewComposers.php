<?php

namespace App\Libraries\ViewComposers;

use Illuminate\View\View;
use App\Models\Entities\CategoryEntity;
use App\Models\Grade;

class CategoryComposer
{
    /**
     * Bind data to the view.
     * Bind data vào view. $view->with('ten_key_se_dung_trong_view', $data);
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('nameGrade', Grade::class);
    }
}
