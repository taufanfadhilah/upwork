<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MingMartClothes extends Model
{
    use HasFactory;

    public $table = 'mingmart_clothes';

    protected $fillable = [
                            'handle',
                            'title',
                            'body_html',
                            'vendor',
                            'type',
                            'tags',
                            'published',
                            'option1_name',
                            'option1_value',
                            'option2_name',
                            'option2_value',
                            'option3_name',
                            'option3_value',
                            'variant_sku',
                            'variant_grams',
                            'variant_inventory_tracker',
                            'variant_inventory_qty',
                            'variant_inventory_policy',
                            'variant_fulfillment_service',
                            'variant_price',
                            'variant_compare_at_price',
                            'variant_requires_shipping',
                            'variant_taxable',
                            'variant_barcode',
                            'image_src',
                            'image_position',
                            'image_alt_text',
                            'gift_card',
                            'seo_title',
                            'seo_description',
                            'google_shop_product_category',
                            'google_shop_gender',
                            'google_shop_age_group',
                            'google_shop_mpn',
                            'google_shop_adwords_grouping',
                            'google_shop_adwords_labels',
                            'google_shop_adwords_condition',
                            'google_shop_adwords_custom_product',
                            'google_shop_adwords_custom_label_0',
                            'google_shop_adwords_custom_label_1',
                            'google_shop_adwords_custom_label_2',
                            'google_shop_adwords_custom_label_3',
                            'google_shop_adwords_custom_label_4',
                            'variant_image',
                            'vairant_weight_unit',
                            'variant_tax_code',
                            'cost_per_item',
                            'size',
                            'size_qty',
                            'size_price',
                            'color',
                            'sku'
                        ];
}
