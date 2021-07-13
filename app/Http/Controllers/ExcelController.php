<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\UsersImport;
use App\Imports\MingMartClothesImport;
use App\Models\MingMartClothes;
use DB;
class ExcelController extends Controller
{
    private $sku = '';
    private $handle = '';
    private $title = '';
    private $body_html ='';
    private $vendor ='';
    private $type = '';
    private $tags = '';
    private $published = '';
    private $option1_name = '';
    private $option1_value = '';
    private $option2_name = '';
    private $option2_value = '';
    private $option3_name = '';
    private $option3_value = '';
    private $variant_sku = [];
    private $variant_grams = [];
    private $variant_inventory_tracker = [];
    private $variant_inventory_qty = [];
    private $variant_inventory_policy = [];
    private $variant_fulfillment_service = [];
    private $variant_price = [];
    private $variant_compare_at_price = [];
    private $variant_requires_shipping = [];
    private $variant_taxable = [];
    private $variant_barcode = [];
    private $image_src = [];
    private $image_position = [];
    private $image_alt_text = [];
    private $gift_card = [];
    private $seo_title = [];
    private $seo_description = [];
    private $google_shop_product_category = [];
    private $google_shop_gender = [];
    private $google_shop_age_group = [];
    private $google_shop_mpn = [];
    private $google_shop_adwords_grouping = [];
    private $google_shop_adwords_labels = [];
    private $google_shop_adwords_condition = [];
    private $google_shop_adwords_custom_product = [];
    private $google_shop_adwords_custom_label_0 = [];
    private $google_shop_adwords_custom_label_1 = [];
    private $google_shop_adwords_custom_label_2 = [];
    private $google_shop_adwords_custom_label_3 = [];
    private $google_shop_adwords_custom_label_4 = [];
    private $variant_image = [];
    private $variant_weight_unit = [];
    private $variant_tax_code = [];
    private $cost_per_item = [];
    private $size = [];
    private $size_qty = [];
    private $size_price = [];
    private $color = [];

    private function resetInitData()
    {
        $this->sku = [];
        $this->variant_sku = [];
        $this->variant_grams = [];
        $this->variant_inventory_tracker = [];
        $this->variant_inventory_qty = [];
        $this->variant_inventory_policy = [];
        $this->variant_fulfillment_service = [];
        $this->variant_price = [];
        $this->variant_compare_at_price = [];
        $this->variant_requires_shipping = [];
        $this->variant_taxable = [];
        $this->variant_barcode = [];
        $this->image_src = [];
        $this->image_position = [];
        $this->image_alt_text = [];
        $this->gift_card = [];
        $this->seo_title = [];
        $this->seo_description = [];
        $this->google_shop_product_category = [];
        $this->google_shop_gender = [];
        $this->google_shop_age_group = [];
        $this->google_shop_mpn = [];
        $this->google_shop_adwords_grouping = [];
        $this->google_shop_adwords_labels = [];
        $this->google_shop_adwords_condition = [];
        $this->google_shop_adwords_custom_product = [];
        $this->google_shop_adwords_custom_label_0 = [];
        $this->google_shop_adwords_custom_label_1 = [];
        $this->google_shop_adwords_custom_label_2 = [];
        $this->google_shop_adwords_custom_label_3 = [];
        $this->google_shop_adwords_custom_label_4 = [];
        $this->variant_image = [];
        $this->variant_weight_unit = [];
        $this->variant_tax_code = [];
        $this->cost_per_item = [];
        $this->size = [];
        $this->size_qty = [];
        $this->size_price = [];
        $this->color = [];
    }

    private function setVarientData($row)
    {
        if(!empty($row[16])){
            $this->size_qty[] = $row[16];
        }
        if(!empty($row[19])){
            $this->size_price[] = $row[19];
        }
        if(!empty($row[8])){
            $this->color[] = $row[8];
        }

        $this->variant_sku[] = $row[13];
        $this->variant_grams[] = $row[14];
        $this->variant_inventory_tracker[] = $row[15];
        $this->variant_inventory_qty[] = $row[16];
        $this->variant_inventory_policy[] = $row[17];
        $this->variant_fulfillment_service[] = $row[18];
        $this->variant_price[] = $row[19];
        $this->variant_compare_at_price[] = $row[20];
        $this->variant_requires_shipping[] = $row[21];
        $this->variant_taxable[] = $row[22];
        $this->variant_barcode[] = $row[23];
        $this->image_src[] = $row[24];
        $this->image_position[] = $row[25];
        $this->image_alt_text[] = $row[26];
        $this->gift_card[] = $row[27];
        $this->seo_title[] = $row[28];
        $this->seo_description[] = $row[29];
        $this->google_shop_product_category[] = $row[30];
        $this->google_shop_gender[] = $row[31];
        $this->google_shop_age_group[] = $row[32];
        $this->google_shop_mpn[] = $row[33];
        $this->google_shop_adwords_grouping[] = $row[34];
        $this->google_shop_adwords_labels[] = $row[35];
        $this->google_shop_adwords_condition[] = $row[35];
        $this->google_shop_adwords_custom_product[] = $row[36];
        $this->google_shop_adwords_custom_label_0[] = $row[37];
        $this->google_shop_adwords_custom_label_1[] = $row[38];
        $this->google_shop_adwords_custom_label_2[] = $row[39];
        $this->google_shop_adwords_custom_label_3[]= $row[40];
        $this->google_shop_adwords_custom_label_4[] = $row[41];
        $this->variant_image[] = $row[42];
        $this->variant_weight_unit[] = $row[43];
        $this->variant_tax_code[] = $row[44];
        $this->cost_per_item[] = $row[45];
    }

    private function getFilledData()
    {
        return [
                'sku' => $this->sku,
                'handle' => $this->handle,
                'title' => $this->title,
                'body_html' => $this->body_html,
                'vendor' => $this->vendor,
                'type' => $this->type,
                'tags' => $this->tags,
                'published' => $this->published,
                'option1_name' => $this->option1_name,
                'option1_value' =>$this->option1_value,
                'option2_name' => $this->option2_name,
                'option2_value' => $this->option2_value,
                'option3_name' => $this->option3_name,
                'option3_value' => $this->option3_value,
                'variant_sku' => json_encode($this->variant_sku),
                'variant_grams' => json_encode($this->variant_grams),
                'variant_inventory_tracker' => json_encode($this->variant_inventory_tracker),
                'variant_inventory_qty' => json_encode($this->variant_inventory_qty),
                'variant_inventory_policy' => json_encode($this->variant_inventory_policy),
                'variant_fulfillment_service' => json_encode($this->variant_fulfillment_service),
                'variant_price' => json_encode($this->variant_price),
                'variant_compare_at_price' => json_encode($this->variant_compare_at_price),
                'variant_requires_shipping' => json_encode($this->variant_requires_shipping),
                'variant_taxable' => json_encode($this->variant_taxable),
                'variant_barcode' => json_encode($this->variant_barcode),
                'image_src' => json_encode($this->image_src),
                'image_position' => json_encode($this->image_position),
                'image_alt_text' => json_encode($this->image_alt_text),
                'gift_card' => json_encode($this->gift_card),
                'seo_title' => json_encode($this->seo_title),
                'seo_description' => json_encode($this->seo_description),
                'google_shop_product_category' => json_encode($this->google_shop_product_category),
                'google_shop_gender' => json_encode($this->google_shop_gender),
                'google_shop_age_group' => json_encode($this->google_shop_age_group),
                'google_shop_mpn' =>json_encode($this->google_shop_mpn),
                'google_shop_adwords_grouping' => json_encode($this->google_shop_adwords_grouping),
                'google_shop_adwords_labels' => json_encode($this->google_shop_adwords_labels),
                'google_shop_adwords_condition' => json_encode($this->google_shop_adwords_condition),
                'google_shop_adwords_custom_product' => json_encode($this->google_shop_adwords_custom_product),
                'google_shop_adwords_custom_label_0' => json_encode($this->google_shop_adwords_custom_label_0),
                'google_shop_adwords_custom_label_1' => json_encode($this->google_shop_adwords_custom_label_1),
                'google_shop_adwords_custom_label_2' => json_encode($this->google_shop_adwords_custom_label_2),
                'google_shop_adwords_custom_label_3' => json_encode($this->google_shop_adwords_custom_label_3),
                'google_shop_adwords_custom_label_4' => json_encode($this->google_shop_adwords_custom_label_4),
                'variant_image' => json_encode($this->variant_image),
                'variant_weight_unit' => json_encode($this->variant_weight_unit),
                'variant_tax_code' => json_encode($this->variant_tax_code),
                'cost_per_item' => json_encode($this->cost_per_item),
                'size' => json_encode($this->size),
                'size_qty' => json_encode($this->size_qty),
                'size_price' => json_encode($this->size_price),
                'color' => json_encode($this->color)
        ];
    }

    public function import(Request $request)
    {
        $start = microtime(true);
        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($request->excel, 'r');
        
        // Skip the first line
        fgetcsv($csvFile);
        
        // Parse data from CSV file line by line
        while(($row = fgetcsv($csvFile)) !== FALSE){
            // Get row data
            if(empty($row[4])){
                // varients
                if(!empty($row[13])){
                    $this->sku_pos2 = strrpos($row[13],'-');
                    if($this->sku_pos2 !== false){
                        $this->size[] = substr($row[13],$this->sku_pos2+1, $this->sku_pos2+2);
                    }else{
                        $this->size[] = null;
                    }
                }

                $this->setVarientData($row);
            }else{
                // main product
                if(empty($this->sku)){
                    if(!empty($row[13])){
                        $this->sku_pos = strpos($row[13], '-');
                        $this->sku_pos2 = strrpos($row[13], '-');
                        if($this->sku_pos !== false){
                            $this->sku = substr($row[13], 0, $this->sku_pos);
                            $this->size[] = substr($row[13], $this->sku_pos2+1, $this->sku_pos2+2);
                        }else{
                            $this->sku = $row[13];
                            $this->size[] = null;
                        }
                    }

                    $this->setVarientData($row);

                    // main product parameters
                    $this->handle = $row[0];
                    $this->title = $row[1];
                    $this->body_html = $row[2];
                    $this->vendor = $row[3];
                    $this->type = $row[4];
                    $this->tags = $row[5];
                    $this->published = $row[6];
                    $this->option1_name = $row[7];
                    $this->option1_value = $row[8];
                    $this->option2_name = $row[9];
                    $this->option2_value = $row[10];
                    $this->option3_name = $row[11];
                    $this->option3_value = $row[12];

                }else{
                    $input = $this->getFilledData();

                    // save this product
                    $matchThis = ['sku' => $input['sku']];
                    MingMartClothes::updateOrCreate($matchThis, $input);
                    $this->resetInitData();
                }
            }
        }
        
        // Close opened CSV file
        fclose($csvFile);
        $end = microtime(true);
        $time = number_format(($end - $start), 2);
        return "This page loaded in $time seconds";
    }
}
