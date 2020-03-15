<?php


namespace App\Actions\Category\GetCategory;


use Illuminate\Database\Eloquent\Collection;

class GetCategoryResponse
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * GetCategoryResponse constructor.
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function categories(): Collection
    {
        return $this->collection;
    }
}
