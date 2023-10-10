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

    public function getPageDir(): string
    {
        return 'Html::admin.pages.currencies';
    }

    public function getIndexSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Валюты'
        );
    }

    public function getCreateSeo(Request $request): SEOData
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
    public function getShowSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Валюта "' . $item->label . '"'
        );
    }

    public function getEditSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Редактирование валюты "' . $item->label . '"'
        );
    }

    public function getCopySeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Копирование валюты "' . $item->label . '"'
        );
    }

    public function getCreateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Создана валюта #' . $item->getKey() . ' ' . $item->label;
    }

    public function getUpdateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Обновлена валюта #' . $item->getKey() . ' ' . $item->label;
    }

    public function getDestroySuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Удалена валюта #' . $item->getKey() . ' ' . $item->label;
    }

    public function getSelectedDestroySuccessMessage(Request $request, array $ids): string
    {
        return 'Удалены валюты #' . implode(', ', $ids);
    }
}
