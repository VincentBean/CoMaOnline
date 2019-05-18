<?php

namespace App\Console\Commands;

use App\Category;
use App\SubCategory;
use App\SubsubCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will create all categories, including subcategories and subsubcategories';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $categoryObj = xmlToJson(simplexml_load_string(getData('categories')), false)->Category;

        foreach ($categoryObj as $category) {

            //Makes an usable slug, so we can create readable URLs
            $categorySlug = Str::slug($category->Name, '-');

            //Create an get the categoryId, used to bind the subcategory
            $categoryId = Category::firstOrCreate(['name' => strtolower($category->Name)], ['slug' => $categorySlug])->id;

            if (is_array($category->Subcategory)) {
                //Contains an array(multiple subcategories)
                foreach ($category->Subcategory as $subCategory) {
                    //Creates the subcategories
                    $subcategoryId = SubCategory::firstOrCreate(['name' => strtolower($subCategory->Name)], ['category_id' => $categoryId])->id;

                    if (is_array($subCategory->Subsubcategory)) {
                        foreach ($subCategory->Subsubcategory as $subsubCategory) {
                            SubsubCategory::firstOrCreate(['name' => strtolower($subsubCategory->Name)], ['sub_category_id' => $subcategoryId]);
                        }
                    } else {
                        SubsubCategory::firstOrCreate(['name' => strtolower($subCategory->Subsubcategory->Name)], ['sub_category_id' => $subcategoryId]);
                    }
                }
            } else {
                //Doesn't contain any elements so we can directly access the object
                $subcategoryId = SubCategory::firstOrCreate(['name' => strtolower($category->Subcategory->Name)], ['category_id' => $categoryId])->id;

                if (is_array($category->Subcategory->Subsubcategory)) {
                    foreach ($category->Subcategory->Subsubcategory as $subsubCategory) {
                        SubsubCategory::firstOrCreate(['name' => strtolower($subsubCategory->Name)], ['sub_category_id' => $subcategoryId]);
                    }
                } else {
                    SubsubCategory::firstOrCreate(['name' => strtolower($category->Subcategory->Subsubcategory->Name)], ['sub_category_id' => $subcategoryId]);
                }
            }
        }
    }
}
