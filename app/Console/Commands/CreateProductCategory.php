<?php

namespace App\Console\Commands;

use App\Category;
use App\Product;
use Illuminate\Console\Command;

class CreateProductCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product_category:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will create products, categories and will attach them on the main category';

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
        // xmlToJson will convert our xml to json
        // getData is a simple get request based on ENV(API_BASE_URL)
        $jsonObj = xmlToJson(simplexml_load_string(getData('products')))->Product;

        foreach ($jsonObj as $data) {
            // echo $data->{'@attributes'}->Id;
            $full_description = (is_object($data->Fulldescription) ? '' : $data->Fulldescription);
            $short_description = (is_object($data->Shortdescription) ? '' : $data->Shortdescription);

            //Insert product, if EAN exist it will get skipped.
            $product = Product::firstOrCreate(['ean' => $data->EAN], ['title' => $data->Title, 'brand' => $data->Brand, 'short_description' => $short_description,
                'full_description' => $full_description, 'image_url' => $data->Image, 'weight' => $data->Weight, 'price' => $data->Price, 'subcategory' => $data->Subcategory,
                'subsubcategory' => $data->Subsubcategory]);

            $categories = explode(",", $data->Category);

            foreach ($categories as $categoryName) {
                //Insert category, if Name exist it will get skipped
                Category::firstOrCreate(['name' => strtolower($categoryName)]);

                //Find the category based on name
                $category = Category::whereName($categoryName)->first();

                //We need to attach the products to their corresponding categories
                if (!$product->categories->contains($category->id)) {
                    $product->categories()->attach($category->id);
                }
            }
        }
    }
}
