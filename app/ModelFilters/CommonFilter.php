<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CommonFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function filter($filters)
    {
        foreach ($filters as $name => $param) {
            $operator = $param['operator'] ?? '==';
            $value = trim($param['value'] ?? '');
            if ($value !== '') {
                $whereOperator = '';
                switch ($operator) {
                    case '==':
                        $whereOperator = '=';
                        break;
                    case '~=':
                        $whereOperator = 'like';
                        $value = '%' . $value . '%';
                        break;
                    case '!=':
                        $whereOperator = '!=';
                        break;
                }
                if ($whereOperator !== '') {
                    $this->where($name, $whereOperator, $value);
                }
            }
        }

        return $this;
    }

    public function sort($value)
    {
        $value = trim($value);
        if ($value !== '') {
            $this->orderBy(str_replace('-', '', $value), str_contains($value, '-') ? 'DESC' : 'ASC');
        }

        return $this;
    }
}
