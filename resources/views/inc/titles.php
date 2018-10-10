<?php

class Info {

    // public static function nav_titles() {
    //     return array(
    //         ['name' => 'Hem', 'url' => URL::$url],
    //         ['name' => 'Getyoga', 'url' => URL::$url . 'getyoga'],
    //         ['name' => 'Gårdsbutik', 'url' => URL::$url . 'gardsbutik'],
    //         ['name' => 'Nyheter/Blogg', 'url' => URL::$url . 'blogg'],
    //         ['name' => 'Recept', 'url' =>  URL::$url . 'recept'],
    //         ['name' => 'Kontakt', 'url' => URL::$url . 'kontakt'],
    //     );
    // }

    public static function nav_titles() {
        return array(
            ['name' => 'Hem', 'url' => '/'],
            ['name' => 'Getyoga', 'url' => '/getyoga'],
            ['name' => 'Gårdsbutik', 'url' => 'gardsbutik'],
            ['name' => 'Nyheter/Blogg', 'url' => '/blogg'],
            ['name' => 'Recept', 'url' =>  '/recept'],
            ['name' => 'Kontakt', 'url' => '/kontakt'],
        );
    }

}

?>