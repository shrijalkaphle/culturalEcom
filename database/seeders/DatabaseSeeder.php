<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
            ['name' => 'admin', 'display' => 'Admin'],
            ['name' => 'customer', 'display' => 'Customer'],
        ]);

        \App\Models\User::insert([
            ['name'=>'admin','role_id'=>'1','email'=>'admin@gmail.com','number'=>'1234567890','email_verified_at'=>Carbon::now(),'password'=>Hash::make('admin')],
            ['name'=>'shrijal','role_id'=>'2','email'=>'shrijal@gmail.com','number'=>'1234567890','email_verified_at'=>Carbon::now(),'password'=>Hash::make('shrijal')],
        ]);

        \App\Models\Category::insert([
            ['name'=>'dress', 'display'=>'Dress'],
            ['name'=>'bodysuit', 'display'=>'Bodysuit'],
            ['name'=>'coat', 'display'=>'Coat'],
            ['name'=>'jacket', 'display'=>'Jacket'],
            ['name'=>'kimono', 'display'=>'Kimono'],
            ['name'=>'leotard', 'display'=>'Leotard'],
            ['name'=>'pyjamas', 'display'=>'Pyjamas'],
            ['name'=>'skirt', 'display'=>'Skirt'],
            ['name'=>'waistcoat', 'display'=>'Waistcoat'],
            ['name'=>'shawl', 'display'=>'Shawl'],
        ]);

        \App\Models\HeroSlider::insert([
            ['file'=>'slider/slider-6235fe4bb2457.jpg'],
            ['file'=>'slider/slider-6235fe4fd4e5a.jpg'],
            ['file'=>'slider/slider-6235fe54797c0.jpg'],
            ['file'=>'slider/slider-6235fe592a06d.jpg'],
            ['file'=>'slider/slider-6235fe5d97c51.jpg'],
        ]);

        \App\Models\Product::insert([
            ['name'=>'Sari','slug'=>'sari','category_id'=>'1','nationality'=>'India','count'=>'22','cost'=>'32.20','description'=>'The sari (often spelled ‘saree’) is a garment traditionally worn in India, Sri Lanka, Pakistan, Bangladesh and Nepal. Though mostly worn by women in modern fashion, the sari is a unisex piece of clothing. It can be an heirloom passed down through generations, or a purely functional garment worn everyday.\r\n\r\nTraditionally, the sari has been defined as a single piece of unstitched fabric, often with heavier sections to allow it to drape correctly. Its border (akin to a hem) would be woven with a heavier density, as would its ‘pallu’ (the often decorative end piece). Today the term has evolved to become inclusive of contemporary materials including cotton, silk, synthetic fiber and more.'],
            ['name'=>'Kimono','slug'=>'kimono','category_id'=>'1','nationality'=>'Japan','count'=>'99','cost'=>'22.30','description'=>'The word ‘kimono’ means ‘a thing to wear’ and has come to denote the traditional full-length robes worn in Japan. The kimono is worn for important festivals and formal occasions and the formality of the garment has become synonymous with politeness and good manners.\r\n\r\nIt’s said that the first prototype for the kimono was the kantoi, a one-piece dress without sleeves, which was worn as far back as the 3rd century. Traditionally kimonos are sewn by hand and even machine-made kimonos require substantial hand-stitching.'],
            ['name'=>'Kebaya','slug'=>'kebaya','category_id'=>'1','nationality'=>'Indonesia','count'=>'99','cost'=>'22.33','description'=> 'A kebaya is a traditional blouse-dress combination that originates from the court of the Javanese Majapahit Kingdom. It is the national costume of Indonesia but is also worn by women in Malaysia, Singapore, Brunei, southern Thailand, Cambodia and the southern part of the Philippines.\r\n\r\nPrior to 1600, a kebaya was a piece of clothing reserved only to be worn by royal family, aristocrats and minor nobility, but adopted by everyone and not just the elite. The blouse-like garment is often semi-transparent and can be made from cotton, velvet, silk, lace and brocade.'],
            ['name'=>'Hanbok','slug'=>'hanbok','category_id'=>'1','nationality'=>'South Korea','count'=>'99','cost'=>'44.99','description'=>'The hanbok in South Korea (or Joseon-oth in North Korea) is the traditional Korean dress. It is characterized by vibrant colors and simple lines without pockets. Although the term literally means ‘Korean clothing’, hanbok usually refers specifically to clothing of the Joseon period, and is worn as semi-formal or formal wear during festivals and celebrations.'],
            ['name'=>'Shúkà','slug'=>'shuka','category_id'=>'4','nationality'=>'Kenya','count'=>'99','cost'=>'23.99','description'=>'Shúkà is the Maa word for sheets traditionally worn wrapped around the body by the Maasai people of southern Kenya and northern Tanzania. The sheeted garments are typically red, sometimes mixed with other colors and patterns like plaid or flowers. One piece garments known as kanga, a Swahili term, are common.\r\n\r\nThis image depicts Maasai warriors arriving at a eunoto ceremony, the most demanding test a warrior traditionally had to face – the stalking and killing of a lion with only a spear to arm him. The lion’s mane headdresses are worn to the ceremony by these warriors to demonstrate their success.'],
            ['name'=>'Kilt','slug'=>'kilt','category_id'=>'2','nationality'=>'Scotland','count'=>'99','cost'=>'39.99','description'=>'A kilt is a knee-length skirt-like garment with pleats at the back, originating in the traditional dress of Gaelic men and boys in the Scottish Highlands. Its first wear was recorded in the 16th century as the ‘great kilt’, and the smaller, more modern kilt emerged in the 18th century.\r\nIt’s only since the 19th century that the kilt has become associated with the wider culture of Scotland and more broadly with Gaelic heritage.\r\n\r\nOften worn on formal occasions and sports events, kilts are often made of woolen cloth in a tartan pattern. While nowadays it’s up to the individual wearer which colors and patterns they wear, in the mid-19th century, many patterns were created and artificially associated with Scottish clans, families or institutions who had Scottish heritage.'],
            ['name'=>'Agbada','slug'=>'agbada','category_id'=>'3','nationality'=>'West Africa','count'=>'99','cost'=>'99.99','description'=>'The agbada is one of the names for a flowing wide-sleeved robe worn by men in West Africa and parts of North Africa. The name ‘agbada’ comes from Yoruba language but is known by various names depending on the ethnic group. The garment is usually decorated with intricate embroidery and is worn on special religious or ceremonial occasions. Many agbadas are made from aso-oke, the hand-woven cloth of the Yoruba, a major ethnic group in Nigeria. The fabric comes in various colors and patterns to reflect the individual style of the wearer.'],
            ['name'=>'Bamileke Elephant Mask','slug'=>'bamileke-elephant-mask','category_id'=>'1','nationality'=>'Bamileke','count'=>'99','cost'=>'99.99','description'=>'Cameroon warriors who render a great service to the Bamileke King are eligible to be members of the Aka, or \'Elephant Mask\' society. They dance at the funeral of the King and at twice yearly meetings wearing dramatic hats and elaborately beaded elephant masks.\r\n\r\nThese costumes belong to the King and display his wealth, power and privilege. The influx of tiny \'pound beads\' – so called because they were sold by the pound in a limitless range of colors and regular shapes – were traded into Central Africa and enabled the development of new motifs of sculptural beadwork incorporating symbolic animal and plant designs.'],
            ['name'=>'Huipil','slug'=>'huipil','category_id'=>'1','nationality'=>'Mexico','count'=>'99','cost'=>'89.99','description'=>'A huipil is the most common traditional garment worn by indigenous women from central Mexico to Central America. A loose-fitting tunic, general made from several pieces of woven fabric, a huipil is often worn with a blue morga, a skirt with an embroidered seam to join it in the middle.\r\n\r\nTraditional huipils, especially ceremonial ones, are usually made with fabric woven on a backstrap loom and are heavily decorated with embroidery, ribbons, lace and more.']
        ]);

        \App\Models\ProductMedia::insert([
            ['product_id'=>'1', 'file'=>'product/product-6235fed9ca247.jpeg'],
            ['product_id'=>'2', 'file'=>'product/product-6235ff187ca9a.jpg'],
            ['product_id'=>'3', 'file'=>'product/product-6235ff5c3d929.jpg'],
            ['product_id'=>'4', 'file'=>'product/product-6235ffaaecc82.jpg'],
            ['product_id'=>'5', 'file'=>'product/product-6235fff9249a0.jpg'],
            ['product_id'=>'6', 'file'=>'product/product-6236003c15777.jpg'],
            ['product_id'=>'7', 'file'=>'product/product-623600653005e.jpg'],
            ['product_id'=>'8', 'file'=>'product/product-623600d19c40f.jpg'],
            ['product_id'=>'9', 'file'=>'product/product-6236031375404.jpg'],
        ]);
    }
}
