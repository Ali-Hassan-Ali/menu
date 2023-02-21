<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        setting::create(['key' => 'whatsapp', 'value'=> '+966 58 000 0693',]);
        setting::create(['key' => 'whatsapp2', 'value'=> '+966 58 000 0693',]);
        setting::create(['key' => 'email', 'value'=> 'eejazcompany@gmail.com',]);
        setting::create(['key' => 'facebook', 'value'=> 'https://www.facebook.com/',]);
        setting::create(['key' => 'twitter', 'value'=> 'https://twitter.com/',]);
        setting::create(['key' => 'instagram', 'value'=> 'https://www.instagram.com/',]);
        setting::create(['key' => 'youtube', 'value'=> 'https://www.youtube.com/',]);
        setting::create(['key' => 'about-us', 'value'=> 'إحدى اكبر شركات الاستقدام نتميز عن غيرنا بسرعة إنجاز المعاملات وسرعة وصول العاملة إليكم ، لدينا فريق خدمة عملاء على مدار 24 ساعة ، متوفر استقدام وتأجير نستقدم لجميع مناطق المملكة والتوصيل الى المنزل',]);
        setting::create(['key' => 'address', 'value'=> 'لسعودية - ينبع البحر - منطقة المدينة المنورة',]);
    }
}
