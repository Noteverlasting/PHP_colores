         <?php

         // MI SOLUCION PARA CAMBIAR COLORES
        // $arrayImagenes = ['img/colores.jpg', 'img/colores2.webp', 'img/colores3.avif', 'img/colores4.jpg', 'img/colores5.avif'];
        // $randomIndex = array_rand($arrayImagenes);
        // $randomImage = $arrayImagenes[$randomIndex];
        // echo '<img src="'.$randomImage.'" alt="fondo colores">';


         // SOLUCION DE FERRAN PARA CAMBIAR COLORES
         $num_random = random_int(0,4);
         $Imagenes = [
            [
                'src' => 'img/colores.jpg',
                'alt' => 'aura de colores degradados'
            ],
            [
                'src' => 'img/colores2.webp',
                'alt' => 'ondas de colores'
            ],
            [
                'src' => 'img/colores3.avif',
                'alt' => 'formas geometricas de colores'
            ],
            [
                'src' => 'img/colores4.jpg',
                'alt' => 'nubes de colores'
            ],
            [
                'src' => 'img/colores5.avif',
                'alt' => 'aura de colores degradados'
            ]
        ];
        

        ?>