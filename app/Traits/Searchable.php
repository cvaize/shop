<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait Searchable
{
    public static function bootSearchable(): void
    {
    }

    public function getSearchIndex(): string
    {
        return $this->getTable();
    }

    public function getSearchType()
    {
        if (property_exists($this, 'useSearchType')) {
            return $this->useSearchType;
        }
        return $this->getTable();
    }

    public function toSearchArray(): array
    {
        return $this->toArray();
    }

    protected function searchOnSql(string $search, int $perPage): Collection
    {
        return $this->where('name', 'like', '%' . $search . '%')->limit($perPage)->get();
    }

    public function search(?string $search = '', int $perPage = 10): \Illuminate\Support\Collection
    {
        if (trim($search) === '') {
            return $this->limit($perPage)->get();
        }

        return $this->searchOnSql($search, $perPage);
    }
}
