<?php


namespace App\Actions\Category\GetCategoryAndProductBySlug;


class GetCategoryAndProductBySlugRequest
{
    /**
     * @var string
     */
    private $slug;

    /**
     * GetCategoryAndProductBySlugRequest constructor.
     */
    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }

    public function getSlug():string
    {
        return $this->slug;
    }
}
