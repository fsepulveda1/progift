<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ShowCommentsAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Ver Comentarios';
    }

    public function getIcon()
    {
        return 'fas fa-comments';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right btn-show-comments',
        ];
    }

    public function getDefaultRoute()
    {
        return route('admin.show.comments',[ 'client_id' => $this->data->client_id ]);
    }

    public function shouldActionDisplayOnDataType()
    {
        if($this->dataType->slug == 'cotizaciones' && !empty($this->data->client->comentarios)) {
            return true;
        }
        return false;
    }
}