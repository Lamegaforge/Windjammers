<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content = $this->getContent();

        return [
            'title' => $this->faker->words($nb = 4, $asText = true),
            'slug' => $this->faker->unique()->slug(),
            'highlight' => $this->faker->paragraph,
            'content' => $content,
            'active' => false,
            'language' => 'fr',
            'published_at' => null,
        ];
    }

    public function french()
    {
        return $this->state(function (array $attributes) {
            return [
                'language' => 'fr',
            ];
        });
    }

    public function english()
    {
        return $this->state(function (array $attributes) {
            return [
                'language' => 'en',
            ];
        });
    }

    public function published()
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => true,
                'published_at' => $this->faker->dateTimeInInterval($startDate = '-30 days', $interval = '-1 days'),
            ];
        });
    }

    protected function getContent(): string
    {
            $parts = [
                '# title',
                '## subtitle',
                "Annoncée ce lundi 15 juin à la surprise générale, une démo de Windjammers 2 a été rendue disponible pendant le Steam Festival, un évènement regroupant plus de 900 démos de jeux pour la plupart encore en développement. Le festival doit prendre fin le lundi 22 juin.",
                "Dotemu a bien fait les choses pour que la communauté de joueurs puisse s'essayer au jeu et faire un maximum de retours en créant un Discord officiel.",
                "Je vous invite donc à rejoindre ce Discord et à découvrir les discussions suscitées par la démo.",
                "Pour faire court, le jeu est vraiment très bien, très fun mais la partie jeu en ligne n'est pas encore optimale - gardons à l'esprit que le jeu est toujours en cours de développement !",
                "La [commauté américaine](#) a tout de même fait au mieux pour proposer un tournoi communautaire le samedi 20 juin, sur la chaîne Twitch de Panda Global et en s'appuyant sur les services de Parsec et Paperspace pour fournir une expérience en ligne alternative. Le tournoi a également servi à récolter des fonds pour l'association Black Girls Code. Une bien belle initiative donc !",
            ];

        return implode(PHP_EOL . PHP_EOL, $parts);
    }
}
