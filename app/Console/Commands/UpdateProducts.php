<?php

namespace App\Console\Commands;

use App\Category;
use App\Product;
use App\SubCategory;
use App\SubsubCategory;
use Illuminate\Console\Command;

class UpdateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update the products';

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
        $productsObj = xmlToJson(simplexml_load_string(getData('products')))->Product;

        foreach ($productsObj as $data) {
            $full_description = (is_object($data->Fulldescription) ? '' : $data->Fulldescription);
            $short_description = (is_object($data->Shortdescription) ? '' : $data->Shortdescription);

            $category = Category::whereName($data->Category)->first();
            $sub_category = SubCategory::whereName($data->Subcategory)->first();
            $subsub_category = SubsubCategory::whereName($data->Subsubcategory)->first();

            //Will update the entire product, only if the EAN exists.
            $product = Product::where('ean', $data->EAN)
                ->update(['category_id' => $category->id,
                    'sub_category_id' => $sub_category->id, 'subsub_category_id' => $subsub_category->id,
                    'title' => $data->Title, 'brand' => $data->Brand,
                    'short_description' => $short_description, 'full_description' => $full_description,
                    'image_url' => $data->Image, 'weight' => $data->Weight, 'price' => $data->Price]);
        }
    }
}
