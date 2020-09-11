<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ChangeStatusAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Ver Comantarios';
    }

    public function getIcon()
    {
        return '';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-default pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return route('admin.change_status',['id'=>$this->data->id]);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'cotizaciones';
    }
}