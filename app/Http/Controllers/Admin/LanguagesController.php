<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController;
use App\Http\Forms\LanguagesForm;
use App\Interfaces\ResourceForm;
use App\Interfaces\ResourceModel;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class LanguagesController extends ResourceController
{
    protected function getModel(): ResourceModel|Model
    {
        return new Language();
    }

    protected function getForm(Request $request, Model|ResourceModel $item): ResourceForm
    {
        return new LanguagesForm($request, $item);
    }

    protected function getPageDir(): string
    {
        return 'Html::admin.pages.languages';
    }

    protected function getIndexSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Языки'
        );
    }

    protected function getCreateSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Создание языка'
        );
    }

    /**
     * @param Request $request
     * @param ResourceModel|Model $item
     * @return SEOData
     */
    protected function getShowSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Язык "' . $item->label . '"'
        );
    }

    protected function getEditSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Редактирование языка "' . $item->label . '"'
        );
    }

    protected function getCopySeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Копирование языка "' . $item->label . '"'
        );
    }

    protected function getCreateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Создан язык #' . $item->getKey() . ' ' . $item->label;
    }

    protected function getUpdateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Обновлен язык #' . $item->getKey() . ' ' . $item->label;
    }

    protected function getDestroySuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Удален язык #' . $item->getKey() . ' ' . $item->label;
    }

    protected function getSelectedDestroySuccessMessage(Request $request, array $ids): string
    {
        return 'Удалены языки #' . implode(', ', $ids);
    }
}
