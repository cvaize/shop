<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController;
use App\Http\Forms\CurrenciesForm;
use App\Interfaces\ResourceForm;
use App\Interfaces\ResourceModel;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class CurrenciesController extends ResourceController
{
    protected function getModel(): ResourceModel|Model
    {
        return new Currency();
    }

    protected function getForm(Request $request, Model|ResourceModel $item): ResourceForm
    {
        return new CurrenciesForm($request, $item);
    }

    protected function getPageDir(): string
    {
        return 'Html::admin.pages.currencies';
    }

    protected function getIndexSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Валюты'
        );
    }

    protected function getCreateSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Создание валюты'
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
            title: 'Валюта "' . $item->label . '"'
        );
    }

    protected function getEditSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Редактирование валюты "' . $item->label . '"'
        );
    }

    protected function getCopySeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Копирование валюты "' . $item->label . '"'
        );
    }

    protected function getCreateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Создана валюта #' . $item->getKey() . ' ' . $item->label;
    }

    protected function getUpdateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Обновлена валюта #' . $item->getKey() . ' ' . $item->label;
    }

    protected function getDestroySuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Удалена валюта #' . $item->getKey() . ' ' . $item->label;
    }

    protected function getSelectedDestroySuccessMessage(Request $request, array $ids): string
    {
        return 'Удалены валюты #' . implode(', ', $ids);
    }
}
