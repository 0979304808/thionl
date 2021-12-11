<?php

namespace App\Admin\Actions\DeThi;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class CauHoi extends RowAction
{
    public function handle(Model $model)
    {
        $model->status = (int) !$model->status;
        $model->save();
        $html = $model->status ? "<i class=\"fa fa-check text-green\"></i>" : "<i class=\"fa fa-close text-red\"></i>";
        return $this->response()->success('Successfully.')->html($html);
    }
    public function display($star)
    {
        return $star ? "<i class=\"fa fa-check text-green\"></i>" : "<i class=\"fa fa-close text-red\"></i>";
    }

    public function dialog()
    {
        $this->confirm('Bạn có muốn tiếp tục?');
    }
}
