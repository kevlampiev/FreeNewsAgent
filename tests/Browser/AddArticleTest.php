<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddArticleTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddCorrectArticle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/russian_policy/articles/add')
                ->type('title', 'Новость сформирована тестом')
                ->type('announcement', 'Новость сформирована тестом, xnj tcnm nj tcnm')
                ->type('article_body', 'Новость сформирована тестом, просьба сильно не ругаться на текст. Новость сформирована тестом, просьба сильно не ругаться на текст')
                ->select('category_id')
                ->select('source_id')
                ->press('Сохранить')
                ->assertPathIs('http://laravel.local/admin/categories/russian_policy/articlesgit ');
        });
    }

    public function testAddIncorrectTitleeArticle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/russian_policy/articles/add')
                ->type('title', '1')
                ->type('announcement', 'Новость сформирована тестом, xnj tcnm nj tcnm')
                ->type('article_body', 'Новость сформирована тестом, просьба сильно не ругаться на текст. Новость сформирована тестом, просьба сильно не ругаться на текст')
                ->press('Сохранить')
                ->assertPathIs('/admin/categories/russian_policy/articles/add')
                ->assertSee('Количество символов в поле Заголовок статьи должно быть между 5 и 255.');
        });
    }

    public function testAddIncorrectAnnouncementArticle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/russian_policy/articles/add')
                ->type('title', 'Новость сформирована тестом')
                ->type('announcement', '')
                ->type('article_body', 'Новость сформирована тестом, просьба сильно не ругаться на текст. Новость сформирована тестом, просьба сильно не ругаться на текст')
                ->press('Сохранить')
                ->assertPathIs('/admin/categories/russian_policy/articles/add')
                ->assertSee('Поле Аннотация обязательно для заполнения.');
        });
    }

    public function testAddIncorrectDescriptionArticle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/russian_policy/articles/add')
                ->type('title', 'Новость сформирована тестом')
                ->type('announcement', 'Новость сформирована тестом, просьба сильно не ругаться на текст. Новость сформирована тестом, просьба сильно не ругаться на текст')
                ->type('article_body', '')
                ->press('Сохранить')
                ->assertPathIs('/admin/categories/russian_policy/articles/add')
                ->assertSee('Поле Содержание статьи обязательно для заполнения.');
        });
    }


}
