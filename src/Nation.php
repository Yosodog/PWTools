<?php


namespace Yosodog\PWTools;


/**
 * Class Nation
 *
 * Currently not an implemented endpoint. Holds information about a single nation
 *
 * @package Yosodog\PWTools
 */
class Nation
{
    public $nID;
    public $nationName;
    public $leader;
    public $continent;
    public $warPolicy;
    public $domesticPolicy;
    public $color;
    public $aID;
    public $alliance;
    public $alliancePosition;
    public $cities;
    public $offensiveWars;
    public $defensiveWars;
    public $score;
    public $vMode;
    public $vModeTurns;
    public $beigeTurns;
    public $lastActive;
    public $founded;
    public $soldiers;
    public $tanks;
    public $aircraft;
    public $ships;
    public $missiles;
    public $nukes;

    /**
     * Nation constructor.
     *
     * When the Nation API is implemented, you will create a Nation class which will call the API
     *
     * @param int $nID
     * @param PWClient $client
     */
    public function __construct(int $nID, PWClient $client = null)
    {
        // TODO When the Nation API comes in, this is how you will create a nation
    }

    protected function setupProperties(\stdClass $nation)
    {
        $this->nID = $nation->nation_id;
        $this->nationName = $nation->nation;
        $this->leader = $nation->leader;
        $this->continent = $nation->continent;
        $this->warPolicy = $nation->war_policy;
        $this->domesticPolicy = $nation->domestic_policy;
        $this->color = $nation->color;
        $this->aID = $nation->alliance_id;
        $this->alliance = $nation->alliance;
        $this->alliancePosition = $nation->alliance_position;
        $this->cities = $nation->cities;
        $this->offensiveWars = $nation->offensive_wars;
        $this->defensiveWars = $nation->defensive_wars;
        $this->score = $nation->score;
        $this->vMode = $nation->v_mode;
        $this->vModeTurns = $nation->v_mode_turns;
        $this->beigeTurns = $nation->beige_turns;
        $this->lastActive = $nation->last_active;
        $this->founded = $nation->founded;
        $this->soldiers = $nation->soldiers;
        $this->tanks = $nation->tanks;
        $this->aircraft = $nation->aircraft;
        $this->ships = $nation->ships;
        $this->missiles = $nation->missiles;
        $this->nukes = $nation->nukes;
    }

    /**
     * This method creates an instance of itself by us passing an API call that has already been made probably from the Nations endpoint
     *
     * @param \stdClass $nationAPI
     * @return static
     */
    public static function fromNationsAPI(\stdClass $nationAPI) : self
    {
        // Setup nation Class
        $nation = new self($nationAPI->nation_id);
        $nation->setupProperties($nationAPI);

        return $nation;
    }
}