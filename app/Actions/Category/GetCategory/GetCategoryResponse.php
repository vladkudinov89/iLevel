<?php


namespace App\Actions\Category\GetCategory;


use Illuminate\Database\Eloquent\Collection;

class GetCategoryResponse
{
    /**
     * @var array
     */
    private $collection;

    /**
     * GetCategoryResponse constructor.
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    public function categories(): array
    {
        return $this->collection;
    }
}
