<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name_ar' => 'إيثيلين', 'name_en' => 'Ethylene', 'description_ar' => 'مادة بتروكيماوية أساسية تُستخدم في تصنيع البوليمرات والمواد البلاستيكية.', 'description_en' => 'A key petrochemical used in the production of polymers and plastic materials.'],
            ['name_ar' => 'بروبيلين', 'name_en' => 'Propylene', 'description_ar' => 'يُستخدم على نطاق واسع في صناعة البولي بروبيلين والمذيبات الصناعية.', 'description_en' => 'Widely used in polypropylene manufacturing and industrial solvents.'],
            ['name_ar' => 'بنزين', 'name_en' => 'Benzene', 'description_ar' => 'مذيب صناعي وسليف رئيسي لتصنيع المواد الكيميائية المتخصصة.', 'description_en' => 'An industrial solvent and key precursor for specialty chemical manufacturing.'],
            ['name_ar' => 'ميثانول', 'name_en' => 'Methanol', 'description_ar' => 'وقود ومذيب وسليف كيميائي يُصدَّر إلى أسواق عالمية متعددة.', 'description_en' => 'A fuel, solvent, and chemical feedstock exported to multiple global markets.'],
            ['name_ar' => 'يوريا', 'name_en' => 'Urea', 'description_ar' => 'سماد نيتروجيني عالي الكفاءة يُستخدم على نطاق واسع في الزراعة.', 'description_en' => 'A high-efficiency nitrogen fertilizer widely used in agriculture.'],
            ['name_ar' => 'أمونيا', 'name_en' => 'Ammonia', 'description_ar' => 'مادة كيميائية صناعية أساسية للأسمدة والمواد المتفجرة والصناعات الكيميائية.', 'description_en' => 'Essential industrial chemical for fertilizers, explosives, and chemical industries.'],
        ];

        foreach ($products as $i => $p) {
            Product::create(array_merge($p, ['sort_order' => $i, 'is_active' => true]));
        }
    }
}
