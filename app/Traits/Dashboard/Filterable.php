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
        // 1. Keyword Search (Support for standard, translatable, and related columns)
        if (!empty($filters['keyword'])) {
            $keyword = $filters['keyword'];
            $query->where(function ($q) use ($keyword, $searchColumns) {
                foreach ($searchColumns as $column) {
                    // Check if it's a relationship search (e.g., 'employee.name')
                    if (str_contains($column, '.')) {
                        [$relation, $subColumn] = explode('.', $column);
                        $q->orWhereHas($relation, function ($rq) use ($keyword, $subColumn) {
                            $relatedModel = $rq->getModel();
                            if (method_exists($relatedModel, 'isTranslatableAttribute') && $relatedModel->isTranslatableAttribute($subColumn)) {
                                $rq->where($subColumn . '->' . app()->getLocale(), 'like', '%' . $keyword . '%');
                            } else {
                                $rq->where($subColumn, 'like', '%' . $keyword . '%');
                            }
                        });
                    } else {
                        // Standard or Translatable on the current model
                        if (method_exists($this, 'isTranslatableAttribute') && $this->isTranslatableAttribute($column)) {
                            $q->orWhere($column . '->' . app()->getLocale(), 'like', '%' . $keyword . '%');
                        } else {
                            $q->orWhere($column, 'like', '%' . $keyword . '%');
                        }
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
