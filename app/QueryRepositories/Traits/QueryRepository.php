<?php
namespace App\QueryRepositories\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Trait QueryRepository
 * @package App\QueryRepositories\Traits
 */
trait QueryRepository
{
    /**
     * @var Builder
     */
    protected $query;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var string|null
     */
    protected $store_key = null;

    /**
     * @return QueryRepository
     */
    public static function create()
    {
        return new self();
    }

    /**
     * QueryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new $this->modelNamespace();
        $this->query = $this->model->newModelQuery();
    }

    /**
     * @param string|null $key
     * @return $this|string
     */
    public function key($key = null)
    {
        if ($key) {
            $this->store_key = $key;
            return $this;
        }
        return $this->store_key;
    }

    /**
     * @return \Illuminate\Contracts\Cache\Repository|int
     */
    public function count()
    {
        $key = $this->key();
        if (Cache::has($key))
            return Cache::get($key);
        $count = $this->query->count();
        Cache::forever($key, $count);
        return $count;
    }

    /**
     * @return $this
     */
    public function forget()
    {
        Cache::forget($this->key());
        return $this;
    }

    /**
     * @return $this
     */
    public function increment()
    {
        $key = $this->key();
        if (!Cache::has($key))
            Cache::forever($key, 0);
        if (!is_integer(Cache::get($key)))
            return $this;
        Cache::increment($key);
        return $this;
    }

    /**
     * @return $this
     */
    public function decrement()
    {
        $key = $this->key();
        if (!Cache::has($key))
            Cache::forever($key, 0);
        if (!is_integer(Cache::get($key)))
            return $this;
        Cache::decrement($key);
        return $this;
    }

    /**
     * @param mixed $param
     * @return mixed
     */
    public function execute($param = null)
    {
        return null;
    }

    /**
     * @return string
     */
    public function toSql()
    {
        return $this->query->toSql();
    }
}