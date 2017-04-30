<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Configurable SimpleMenu
      |--------------------------------------------------------------------------
      |
      | this below array is the menu for your application it is configurable and
      | it has unlimited submenus as well Enjoy...
      |  
      | Key Explantions : 
      |     The parent json for example 'dash_board' is the parent id which is used
      |     always have it unique
      |  title -> is the name returns in the view (will be converted to ucaps)
      |  url -> it is the url of the menu
      |  order -> display order of the menu
      |  children -> array of same above key pairs  
      |
      | 
     */

    'dash_board' => [
        'title' => 'dashboard',
        'url' => route('/'),
        'order' => 1,
        'children' => []
    ]
];
