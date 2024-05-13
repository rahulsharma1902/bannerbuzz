<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutUsContent;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'banner_image' => 'banner_image1709291886.png',
            'header1_title' => 'Reasons Why Customers Are Loyal To Us',
            'header1_images' => '{"about-us1.png":"Customized to Perfection","about-us2.png":"High QualityInks","about-us3.png":"Easy-To UseDesign Tool","about-us4.png":"Cutting Edge Printing Process","about-us5.png":"Highest QualityGuaranteed","about_img51709294156.png":"Countless Product Choices"}',
            'header2_title' => 'You Imagine. We Create.',
            'header2_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non consequat massa. Suspendisse at lacinia arcu. Maecenas volutpat sapien sit amet justo ornare egestas. Nunc lobortis nunc at sapien gravida, ut scelerisque risus auctor. Vestibulum at lacus sit amet mauris volutpat fermentum a et sapien. Nam vel sodales risus. Vestibulum sodales in dui vitae feugiat. Duis pretium sem purus, consectetur maximus enim faucibus id. Quisque vulputate lacinia dolor.</p>',
            'employee_name' => 'John Doe',
            'employee_image' => 'emp1709291886.png',
            'employee_experience' => '25+ Years of Experience in Printing Service',
            'about_employee' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non consequat massa. Suspendisse at lacinia arcu. Maecenas volutpat sapien sit amet justo ornare egestas. Nunc lobortis nunc at sapien gravida, ut scelerisque risus auctor. Vestibulum at lacus sit amet mauris volutpat fermentum a et sapien. Nam vel sodales risus. Vestibulum sodales in dui vitae feugiat. Duis pretium sem purus, consectetur maximus enim faucibus id. Quisque vulputate lacinia dolor.</p><p>Curabitur vel sollicitudin tellus. Aenean et ex tellus. Nunc egestas vel diam ut blandit. Vivamus mi ipsum, dapibus et porta at, elementum et elit. Curabitur dignissim quam nec mollis auctor. Nam ut orci sed mauris venenatis tincidunt ut ac sapien. Phasellus vel lacus velit. Quisque cursus hendrerit enim in interdum. Suspendisse maximus arcu vel ipsum commodo, non fermentum eros convallis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse potenti. Phasellus ut purus non elit efficitur mollis. Vestibulum id malesuada augue. Aliquam sagittis mollis ipsum quis consectetur. Phasellus laoreet elementum aliquam.</p>',
            'bottom1_title' => 'Empowering Businesses Worldwide',
            'bottom1_description' => '<p>Group Bayport, a trailblazer in the custom products industry, is a leading conglomerate of various e-commerce brands specializing in different customized and personalized advertising products and covering solutions. Group Bayport houses various brands, namely Cre8ivePrinter<br>, Covers &amp; All, Giant Media, Circle One, Neon Earth, and Vivyx Printing, under its umbrella.</p>',
            'bottom_logos' => '["logo_img01709291886.png","logo_img11709291886.png","logo_img21709291886.png","logo_img31709291886.png"]',
            'bottom2_title' => 'You Imagine. We Create.',
            'bottom2_subtitle' => 'From Order Placement to Final Delivery',
            'bottom2_images' => '["banner01709291886.png","banner11709292157.png","banner21709292157.png"]',
            'bottom2_image_title' => '["Premium Quality","Priority shipping","24x7 Customer Support"]',
            'bottom2_image_text' => '["100% QualityAdherence","For FasterDelivery","Quick & EfficientIssue Resolving"]',
        ];
        
        $header1_images = json_decode($data['header1_images'], true);
        $bottom_logos = json_decode($data['bottom_logos'], true);
        $bottom2_images = json_decode($data['bottom2_images'], true);
        $bottom2_image_title = json_decode($data['bottom2_image_title'], true);
        $bottom2_image_text = json_decode($data['bottom2_image_text'], true);
        
        $data['header1_images'] = json_encode($header1_images);
        $data['bottom_logos'] = json_encode($bottom_logos);
        $data['bottom2_images'] = json_encode($bottom2_images);
        $data['bottom2_image_title'] = json_encode($bottom2_image_title);
        $data['bottom2_image_text'] = json_encode($bottom2_image_text);
        
        AboutUsContent::truncate();
        AboutUsContent::create($data);
    }
}
