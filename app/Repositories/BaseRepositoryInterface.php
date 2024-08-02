<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{

    public function setModel(Model $model);

    public function getModel(): Model;

    public function all($columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id, $attribute = "id");

    public function updateOrCreate(array $attributes, array $values);

    public function find($id);

    public function findOrFail($id);

    public function findWhere(string $field, $condition, $columns);

    public function first();

    public function last();

    public function next($id);

    public function before($id);

    public function firstOrCreate(array $attributes, array $values);

    public function whereIn($attribute, array $values);

    public function max($column);

    public function min($column);

    public function avg($column);

    public function delete(int $id);

    public function truncate();

    public function count();

    public function paginate($columns = ['*'], $perPage = 8);

    public function simplePaginate($limit = null, $columns = ['*']);

    public function search(array $query, $columns = ["*"]);

    public function pluck($value, $key = null);

    public function with($relations);

    public function toSql();

    public function getByCondition($column, $conditions);
}
