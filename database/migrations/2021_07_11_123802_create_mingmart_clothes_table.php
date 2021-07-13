<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMingmartClothesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mingmart_clothes', function (Blueprint $table) {
            $table->id();
            $table->text('handle')->nullable();
            $table->text('title')->nullable();
            $table->longText('body_html')->nullable();
            $table->string('vendor')->nullable();
            $table->string('type')->nullable();
            $table->text('tags')->nullable();
            $table->string('published')->nullable();
            $table->string('option1_name')->nullable();
            $table->string('option1_value')->nullable();
            $table->string('option2_name')->nullable();
            $table->string('option2_value')->nullable();
            $table->string('option3_name')->nullable();
            $table->string('option3_value')->nullable();
            $table->string('variant_sku')->nullable();
            $table->string('variant_grams')->nullable();
            $table->string('variant_inventory_tracker')->nullable();
            $table->string('variant_inventory_qty')->nullable();
            $table->string('variant_inventory_policy')->nullable();
            $table->string('variant_fulfillment_service')->nullable();
            $table->string('variant_price')->nullable();
            $table->string('variant_compare_at_price')->nullable();
            $table->string('variant_requires_shipping')->nullable();
            $table->string('variant_taxable')->nullable();
            $table->string('variant_barcode')->nullable();
            $table->longText('image_src')->nullable();
            $table->string('image_position')->nullable();
            $table->string('image_alt_text')->nullable();
            $table->string('gift_card')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('google_shop_product_category')->nullable();
            $table->string('google_shop_gender')->nullable();
            $table->string('google_shop_age_group')->nullable();
            $table->string('google_shop_mpn')->nullable();
            $table->string('google_shop_adwords_grouping')->nullable();
            $table->string('google_shop_adwords_labels')->nullable();
            $table->string('google_shop_adwords_condition')->nullable();
            $table->string('google_shop_adwords_custom_product')->nullable();
            $table->string('google_shop_adwords_custom_label_0')->nullable();
            $table->string('google_shop_adwords_custom_label_1')->nullable();
            $table->string('google_shop_adwords_custom_label_2')->nullable();
            $table->string('google_shop_adwords_custom_label_3')->nullable();
            $table->string('google_shop_adwords_custom_label_4')->nullable();
            $table->string('variant_image')->nullable();
            $table->string('variant_weight_unit')->nullable();
            $table->string('variant_tax_code')->nullable();
            $table->string('cost_per_item')->nullable();
            $table->string('size')->nullable();
            $table->string('size_qty')->nullable();
            $table->string('size_price')->nullable();
            $table->string('color')->nullable();
            $table->string('sku')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mingmart_clothes');
    }
}
