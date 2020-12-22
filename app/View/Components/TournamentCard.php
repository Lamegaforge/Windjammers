<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TournamentCard extends Component
{
    /**
     * The tournament array.
     *
     * @var Array
     */
    public $tournament;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $tournament)
    {
        $this->tournament = $tournament;
    }

    public function buttonUrl(): string
    {
        if ($this->tournament['state'] === 'finished') {
            return $this->tournament['challonge_url'] . '/standings';
        }

        return $this->tournament['challonge_url'];
    }

    public function buttonText(): string
    {
        switch ($this->tournament['state']) {
            case 'open':
                return 'Participer';
                break;
            case 'closed':
                return 'Voir le tournoi';
                break;
            case 'finished':
                return 'Voir les résultats';
                break;
        }
    }

    public function badgeClasses(): string
    {
        switch ($this->tournament['state']) {
            case 'open':
                return 'bg-green-100 text-green-800';
                break;
            case 'closed':
                return 'bg-red-100 text-red-800';
                break;
            case 'finished':
                return 'bg-gray-100 text-gray-800';
                break;
        }
    }

    public function badgeText(): string
    {
        switch ($this->tournament['state']) {
            case 'open':
                return 'Ouvert';
                break;
            case 'closed':
                return 'Fermé';
                break;
            case 'finished':
                return 'Terminé';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.tournament_card');
    }
}
