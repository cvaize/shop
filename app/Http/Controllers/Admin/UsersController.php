<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CurrencyStatus;
use App\Enums\LanguageStatus;
use App\Http\Controllers\ResourceController;
use App\Http\Forms\UsersForm;
use App\Interfaces\ResourceForm;
use App\Interfaces\ResourceModel;
use App\Models\Currency;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class UsersController extends ResourceController
{
    protected function getModel(): ResourceModel|Model
    {
        $user = (new User());
        $user->with(['currency', 'language']);
        return $user;
    }

    protected function getForm(Request $request, Model|ResourceModel $item): ResourceForm
    {
        return new UsersForm($request, $item);
    }

    protected function loadRelationship(Request $request, array $data): array
    {
        $data['languages'] = Language::where('status', LanguageStatus::Active->value)->get();
        $data['currencies'] = Currency::where('status', CurrencyStatus::Active->value)->get();
        return $data;
    }

    protected function getPageDir(): string
    {
        return 'Html::admin.pages.users';
    }

    protected function getIndexSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Пользователи'
        );
    }

    protected function getCreateSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Создание пользователя'
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
            title: 'Пользователь "' . $item->email . '"'
        );
    }

    protected function getEditSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Редактирование пользователя "' . $item->email . '"'
        );
    }

    protected function getCopySeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Копирование пользователя "' . $item->email . '"'
        );
    }

    protected function getCreateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Создан пользователь #' . $item->getKey() . ' ' . $item->email;
    }

    protected function getUpdateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Обновлен пользователь #' . $item->getKey() . ' ' . $item->email;
    }

    protected function getDestroySuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Удален пользователь #' . $item->getKey() . ' ' . $item->email;
    }

    protected function getSelectedDestroySuccessMessage(Request $request, array $ids): string
    {
        return 'Удалены пользователи #' . implode(', ', $ids);
    }
}
