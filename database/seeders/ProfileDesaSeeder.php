<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfileDesa;

class ProfileDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileDesa::factory()->create([
            'tentang_desa' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad aliquid iste inventore, eaque suscipit aperiam tempore commodi saepe consectetur quisquam molestiae, rem ab minima corporis maiores laboriosam libero molestias neque?
            Temporibus et, fugiat sit tenetur autem magni amet est nam natus, nostrum quas pariatur dolore obcaecati sed, expedita illum iusto ut iste unde saepe eligendi sint inventore. Ipsa, et nihil?
            Veritatis laudantium provident tenetur nihil eveniet placeat saepe assumenda, animi impedit adipisci sint repellendus sapiente consequatur voluptas praesentium nobis mollitia distinctio. Sunt aut ad et neque dolor consequuntur. Exercitationem, odio?
            Voluptatibus et iusto illum est, nulla consectetur alias quam repellat, impedit, quia beatae? Repellat asperiores maiores nostrum odio, modi similique nam ex dolorem labore numquam dolores omnis natus totam corporis!
            Iure doloribus quae corrupti molestias deserunt mollitia, minus voluptate! Quod officiis et fuga. Corporis rerum quia eum velit, harum debitis error tempora sit commodi in assumenda, dolorum voluptatibus vitae recusandae.',
        'gambar' => 'https://scontent.fcgk18-2.fna.fbcdn.net/v/t39.30808-6/242877890_220570553448652_7680682074254948053_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=Fd80730Zs94AX9ie3Xh&_nc_ht=scontent.fcgk18-2.fna&oh=00_AfCoKhEU_ufSa-9B35yFkiV2KWj6xZkgshckmOy4YGEWBA&oe=6589D46E',
        'link_peta' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2498.416526684065!2d107.5508618368261!3d-6.265187567250598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6965f27b631287%3A0x5976801e2881a38f!2sKantor%20Kepala%20Desa%20Cikalong!5e0!3m2!1sen!2sid!4v1703432079796!5m2!1sen!2sid',
        'visi' => 'Mewujudkan Desa Cikalong yang Mandiri, Sejahtera, dan Berdaya Saing Menuju Pusat Kearifan Lokal',
        'misi' => '1. Pembangunan Ekonomi Berbasis Lokal\n 2. Pendidikan dan Pengembangan Sumber Daya Manusia\n 3. Pemberdayaan Perempuan dan Pemuda\n 4. Promosi dan Pemasaran Produk Lokal\n 5. Partisipasi Masyarakat dan Pemerintahan Yang Responsif',
        ]);
    }
}
