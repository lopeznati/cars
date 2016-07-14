<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AutocompleteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    public function testExample()
    {
       $nati=seed('User',[
           'name'=>'jeffer',
           'email'=>'jeffer@gmail.com'

       ]);

       $jeffer= seed('User',[

            'name'=>'jeffer',
            'email'=>'jeffer@gmail.com'

        ]);
        $jesus=seed('User',[
            'name'=>'jesus',
            'email'=>'jesus@gmail.com'


        ]);
        $this->get('autocomplete/users?term=nati')
           ->seeStatusCode(200)
           ->seeJson([
               'id'=>$nati->id,
               'name'=>'nati',
               'email'=>'nati@gmail.com'

           ]);

        $this->get('autocomplete/users?term=je')
            ->seeStatusCode(200)
            ->seeJson([
                'id'=>$jeffer->id,
                'name'=>'jeffer',
                'email'=>'jeffer@gmail.com'

            ],
                [
                    'id'=>$jesus->id,
                    'name'=>'jesus',
                    'email'=>'jesus@gmail.com'

                ]);


    }
}
