<?php

namespace App\Traits\Dashboard;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Generic scope to filter models based on request parameters.
     *
     * @param Builder $query
     * @param array $filters
     * @param array $searchColumns Columns to search for 'keyword'
     * @param array $exactMatches Fields that require exact match (e.g. ['status', 'category_id'])
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $filters, array $searchColumns = ['name'], array $exactMatches = [])
    {
        // 1. Keyword Search (Support for standard or translatable columns)
        if (!empty($filters['keyword'])) {
            $keyword = $filters['keyword'];
            $query->where(function ($q) use ($keyword, $searchColumns) {
                foreach ($searchColumns as $column) {
                    // Check if the model has the HasTranslations trait and if the column is translatable
                    if (method_exists($this, 'isTranslatableAttribute') && $this->isTranslatableAttribute($column)) {
                        $q->orWhere($column . '->' . app()->getLocale(), 'like', '%' . $keyword . '%');
                    } else {
                        $q->orWhere($column, 'like', '%' . $keyword . '%');
                    }
                }
            });
        }

        // 2. Exact Matches (IDs, Status, etc.)
        foreach ($exactMatches as $field) {
            if (!empty($filters[$field])) {
                $query->where($field, $filters[$field]);
            }
        }

        return $query;
    }
}
