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
            'thumbnail' => $this->faker->imageUrl($width = 640, $height = 480, 'cats'),
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
            "Alors que l'UFA (Ultimate Fighting Arena) venait de dépasser le millier de compétiteurs inscrits sur les jeux de baston du moment, on apprenait qu'un tournoi sur **Windjammers 2** y serait organisé ! ",
            "[Dotemu](#) était donc présent avec 4 postes PC faisant tourner une version encore largement en développement du jeu (sortie prévue courant 2020).",
            "**Six personnages étaient jouables** : trois nouveaux (Sophie, Max et Jao) et trois issus du premier épisode (Wessel, Mita et Biaggi). Force et de constater que Max et Sophie ont séduit en grande partie grâce à leur gameplay. Sophie (de Lys) semble assez équilibrée et sa super custom est possiblement la plus surprenante  du jeu. Max lui et le plus lent mais cet handicap ne paraît pas l'affecter tant que ça. Outre la force de son lancer, c'est son aisance au 'slapshot' - un coup chargé qui envoie un supersonic shot - qui fait vraiment la différence.",
            "[](https://twitter.com/Windjammers/status/1180459451817611264)",
            "[](https://twitter.com/Windjammers/status/1274002763832348673)",
            "Car au niveau des mécaniques, on retrouve tout ce que l'original propose plus des ajouts bienvenus qui dynamise le jeu. **Finie la campe en défense**, le bouton de lob permet désormais de frapper le frisbee pour qu'il retombe rapidement au sol derrière le filet (un 'dropshot'). Un rebond au sol est accordé au défenseur sans quoi ce nouveau coup serait trop efficace.",
            "[](https://www.youtube.com/embed/YWsCtYUXM3U)",
            "[L'arbre du tournoi](#) et le [top 8 en vidéo]().",
            "Merci aux équipe de l'UFA et de Dotemu.",
        ];

        return implode(PHP_EOL . PHP_EOL, $parts);
    }
}
