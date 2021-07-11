<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\UsersImport;
use App\Imports\MingMartClothesImport;
use DB;
class ExcelController extends Controller
{
    public function importWithLibrary(Request $request)
    {
        $start = microtime(true);
        Excel::import(new MingMartClothesImport, $request->excel);
        $end = microtime(true);
        $time = number_format(($end - $start), 2);
        return "This page loaded in $time seconds";
    }

    public function import(Request $request)
    {
        $start = microtime(true);
        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($request->excel, 'r');
        
        // Skip the first line
        fgetcsv($csvFile);
        $data = [];
        // Parse data from CSV file line by line
        while(($row = fgetcsv($csvFile)) !== FALSE){
            // Get row data
            $data[] = [
                        'handle' => $row[0],
                        'title' => $row[1],
                        'body_html' => $row[2],
                        'vendor' => $row[3],
                        'type' => $row[4],
                        'tags' => $row[5],
                        'published' => $row[6],
                        'option1_name' => $row[7],
                        'option1_value' => $row[8],
                        'option2_name' => $row[9],
                        'option2_value' => $row[10],
                        'option3_name' => $row[11],
                        'option3_value' => $row[12],
                        'variant_sku' => $row[13],
                        'variant_grams' => $row[14],
                        'variant_inventory_tracker' => $row[15],
                        'variant_inventory_qty' => $row[16],
                        'variant_inventory_policy' => $row[17],
                        'variant_fulfillment_service' => $row[18],
                        'variant_price' => $row[19],
                        'variant_compare_at_price' => $row[20],
                        'variant_requires_shipping' => $row[21],
                        'variant_taxable' => $row[22],
                        'variant_barcode' => $row[23],
                        'image_src' => $row[24],
                        'image_position' => $row[25],
                        'image_alt_text' => $row[26],
                        'gift_card' => $row[27],
                        'seo_title' => $row[28],
                        'seo_description' => $row[29],
                        'google_shop_product_category' => $row[30],
                        'google_shop_gender' => $row[31],
                        'google_shop_age_group' => $row[32],
                        'google_shop_mpn' => $row[33],
                        'google_shop_adwords_grouping' => $row[34],
                        'google_shop_adwords_labels' => $row[35],
                        'google_shop_adwords_condition' => $row[35],
                        'google_shop_adwords_custom_product' => $row[36],
                        'google_shop_adwords_custom_label_0' => $row[37],
                        'google_shop_adwords_custom_label_1' => $row[38],
                        'google_shop_adwords_custom_label_2' => $row[39],
                        'google_shop_adwords_custom_label_3' => $row[40],
                        'google_shop_adwords_custom_label_4' => $row[41],
                        'variant_image' => $row[42],
                        'vairant_weight_unit' => $row[43],
                        'variant_tax_code' => $row[44],
                        'cost_per_item' => $row[45],
                    ];
        }
        
        // Close opened CSV file
        fclose($csvFile);
        DB::table('mingmart_clothes')->insert($data);
        $end = microtime(true);
        $time = number_format(($end - $start), 2);
        return "This page loaded in $time seconds";
    }
}
