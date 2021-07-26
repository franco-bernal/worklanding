<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS =0;');
        $j_contactos = [
            "whatsapp" => "+56945181665",
            "linkedin" => "franco-bernal",
            "cv" => "pdf/curriculum-franco.pdf",
            "email" => "franco.bernalgutierrez@gmail.com",
        ];

        User::create([
            'name' => "admin",
            'email' => "admin@admin.cl",
            'password' => Hash::make("123456789"),
            'tipo_usuario' => 1,
            'contactos' => json_encode($j_contactos, true),
        ]);
        $j_color = [
            "a_color" => "#ffffff",
            "b_color" => "#759933",
            "ab_color" => "#000000",
            "bc_color" => "#ffffff",
        ];
        $j_img = [
            "logo_img" => "img/logo-franco-blanco.png",
            "header_back_img" => "https://images.pexels.com/photos/373543/pexels-photo-373543.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
            "necesitas_back_img" => "https://pa1.narvii.com/6730/6335bf4284ef672be8a66bc7e31b63ca29c0e0fc_hq.gif",
            "tecnologias_img" => "https://blog.hubspot.es/hubfs/Descarga%20de%20fondos%20para%20pa%CC%81ginas%20web.jpg",
            "tarjeta_pre_img" => "img/tarjeta-franco2.png"
        ];
        $j_text = [
            "header_sub_text" => "Franco Bernal Gutiérrez",
            "header_text" => "[Desarrollo web]",
            "necesitas_title_text" => "¿Necesitas una web?",
            "necesitas_sub_text" => "Promociona tus productos, alcanza tu competencia, encuentra nuevos clientes y <span class='subraya strong'>muestrate al mundo</span>",
        ];
        $j_settings = [
            "footer_sett" => "Portafolio 2020 Franco Bernal Gutiérrez"

        ];

        DB::table('pages')->insert([
            "user" => 1,
            "color" => json_encode($j_color, true),
            "img" => json_encode($j_img, true),
            "text" => json_encode($j_text, true),
            "settings" => json_encode($j_settings, true),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);



        DB::table('products')->insert([
            "name" => "los galaxticos del humor",
            "description" => "web para contrataciones",
            "img_logo" => "https://losgalaxticosdelhumor.cl/wp-content/uploads/2021/06/logo-galaxticos-compressed.png",
            "img_back" => "https://losgalaxticosdelhumor.cl/wp-content/uploads/2021/06/IMG-20210602-WA0076.jpg",
            "link" => "https://losgalaxticosdelhumor.cl/",
            "tecnology" => "wordpress",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('products')->insert([
            "name" => "Marking Aptitud",
            "description" => "web marketing digital",
            "img_logo" => "https://www.markingaptitud.cf/wp-content/uploads/2021/06/Imagotipo-300x298.png",
            "img_back" => "https://www.markingaptitud.cf/wp-content/uploads/2021/06/Captura-de-pantalla-2021-05-30-141404.png",
            "link" => "https://www.markingaptitud.cf/",
            "tecnology" => "wordpress",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('noticias')->insert([
            "id_user" => 1,
            "title" => "Tecnologías disponibles",
            "subtitle" => "Nuevas tecnologías disponibles",
            "btn_text" => "ir",
            "btn_link" => "#tecnologias",
            "background" => "https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
            "order" => 1,
            "active" => 1,
        ]);
        DB::table('noticias')->insert([
            "id_user" => 1,
            "title" => "Nuevos productos agregados",
            "subtitle" => "Visita los productos creados recientemente",
            "btn_text" => "Ir",
            "btn_link" => "#productos",
            "background" => 'https://images.pexels.com/photos/802024/pexels-photo-802024.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            "order" => 1,
            "active" => 1,
        ]);
        DB::table('noticias')->insert([
            "id_user" => 1,
            "title" => "Guias programación básica",
            "subtitle" => "como comenzar en html, js, laravel, etc..",
            "btn_text" => "Ir",
            "btn_link" => "",
            "background" => 'https://midu.dev/images/wallpapers/web-technologies-4k-wallpaper.png',
            "order" => 1,
            "active" => 1,
        ]);
        DB::table('noticias')->insert([
            "id_user" => 1,
            "title" => "Guias programación básica",
            "subtitle" => "como comenzar en html, js, laravel, etc..",
            "btn_text" => "Ir",
            "btn_link" => "",
            "background" => 'https://midu.dev/images/wallpapers/web-technologies-4k-wallpaper.png',
            "order" => 1,
            "active" => 1,
        ]);
        DB::table('noticias')->insert([
            "id_user" => 1,
            "title" => "Portafolios",
            "subtitle" => "Necesitas diseñador?",
            "btn_text" => "Ir",
            "btn_link" => "",
            "background" => 'https://images.pexels.com/photos/5836/yellow-metal-design-decoration.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            "order" => 1,
            "active" => 1,
        ]);
        DB::table('emails')->insert([
            'user_id' => 1,
            'name' => "juanito",
            'email' => "juanito@juan.cl",
            'numero' => "+5692654811",
            'mensaje' => "hola, quisiera cotizar tus servicios",
            'form_nom' => "landing",
            'estado' => "activo",
            'fijar' => 0,
            'extras' => "[]"
        ]);
        $j_numbers = [
            "whatsapp" => 0,
            "linkedin" => 0,
            "cv" => 0,
            "email" => 0,
        ];
        DB::table('stadistics')->insert([
            'name' => "contacts",
            'detalles' => "contador para los botones de contactos de la landing",
            'numbers' => json_encode($j_numbers, true),
        ]);


        DB::table('tecnologies')->insert([
            "name" => "html",
            "description" => "HTML es un lenguaje de marcado que nos permite indicar la estructura de nuestro documento mediante etiquetas. Este lenguaje nos ofrece una gran adaptabilidad, una estructuración lógica y es fácil de interpretar tanto por humanos como por máquinas.",
            "img_logo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/230px-HTML5_logo_and_wordmark.svg.png",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('tecnologies')->insert([
            "name" => "css",
            "description" => "El CSS (hojas de estilo en cascada) es un lenguaje que define la apariencia de un documento escrito en un lenguaje de marcado (por ejemplo, HTML).",
            "img_logo" => "https://c0.klipartz.com/pngpicture/893/87/gratis-png-hojas-de-estilo-en-cascada-logo-css3-html-css3-logo.png",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('tecnologies')->insert([
            "name" => "javascript",
            "description" => "JavaScript (abreviado comúnmente JS) es un lenguaje de programación interpretado, dialecto del estándar ECMAScript. ",
            "img_logo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/1200px-Unofficial_JavaScript_logo_2.svg.png",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('tecnologies')->insert([
            "name" => "jquery",
            "description" => "Framework Javascript (abreviado comúnmente)",
            "img_logo" => "https://blog.artegrafico.net/wp-content/uploads/2019/02/jQuery-logo.png",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('tecnologies')->insert([
            "name" => "bulma.io",
            "description" => "Framework Css (abreviado comúnmente)",
            "img_logo" => "https://shuffle.dev/vendor/shuffle/img/logos/bulma.svg",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        DB::table('tecnologies')->insert([
            "name" => "php",
            "description" => "Lenguaje de programación",
            "img_logo" => "https://kinsta.com/es/wp-content/uploads/sites/8/2018/05/qu%C3%A9-es-php-1-1024x512.png",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('tecnologies')->insert([
            "name" => "laravel",
            "description" => "Framework php (abreviado comúnmente)",
            "img_logo" => "https://cms-assets.tutsplus.com/uploads/users/769/posts/25334/preview_image/get-started-with-laravel-6-400x277.png",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        DB::table('tecnologies')->insert([
            "name" => "Wordpress",
            "description" => "creador de páginas",
            "img_logo" => "https://rockcontent.com/es/wp-content/uploads/sites/3/2020/06/Gu%C3%ADa-completa-de-Wordpress.png",
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}


// $table->string('name');
// $table->string('detalles');
// $table->json('numbers');