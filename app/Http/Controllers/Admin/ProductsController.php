<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController;
use App\Http\Forms\ProductsForm;
use App\Interfaces\ResourceForm;
use App\Interfaces\ResourceModel;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class ProductsController extends ResourceController
{
    protected function getModel(): ResourceModel|Model
    {
        return new Product();
    }

    protected function getForm(Request $request, Model|ResourceModel $item): ResourceForm
    {
        return new ProductsForm($request, $item);
    }

    protected function getPageDir(): string
    {
        return 'Html::admin.pages.products';
    }

    protected function getIndexSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Товары'
        );
    }

    protected function getCreateSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Создание товара'
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
            title: 'Товар "' . $item->code . '"'
        );
    }

    protected function getEditSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Редактирование товара "' . $item->code . '"'
        );
    }

    protected function getCopySeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Копирование товара "' . $item->code . '"'
        );
    }

    protected function getCreateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Создан товар #' . $item->getKey() . ' ' . $item->code;
    }

    protected function getUpdateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Обновлен товар #' . $item->getKey() . ' ' . $item->code;
    }

    protected function getDestroySuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Удален товар #' . $item->getKey() . ' ' . $item->code;
    }

    protected function getSelectedDestroySuccessMessage(Request $request, array $ids): string
    {
        return 'Удалены товары #' . implode(', ', $ids);
    }
}
